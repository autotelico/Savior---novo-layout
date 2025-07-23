<?php

namespace App\Service\API;

use App\Entity\Account\Account;
use App\Entity\Post\Link;
use App\Entity\Shop\Order;
use App\Helper\Feedback;
use App\Helper\PaymentStatus;
use App\Service\AccountService;
use App\Infra\Payment\Paypal;
use App\Infra\Payment\Pix;
use App\Service\ItemAwardService;
use App\Service\Shop\CoinService;
use App\Service\Shop\OrderService;

class WebhookService 
{
    public function __construct(
        private OrderService $orderService,
        private AccountService $accountService,
        private CoinService $coinService,
        private ItemAwardService $itemAwardService,
    ){}

    private function updateAccountBalance(Account $account, int $coins, int $dragonCoins): void
    {
        $account->setCoins($account->getCoins() + $coins);
        $account->setDragonCoins($account->getDragonCoins() + $dragonCoins);
        $this->accountService->update($account);
    }

    private function processPixNotification(array $dataFromRequest): array
    {
        $pix = new Pix(null, null);
        $pix->checkPagHiperPostNotification($dataFromRequest);
        return $pix->processPagHiperNotification($dataFromRequest);
    }

    private function validateTransactionAndDisplayID(Order $order, string $transactionID, string $displayID): void
    {
        if ($order->getTransactionID() != $transactionID) {
            throw new \InvalidArgumentException(Feedback::INVALID_TRANSACTION_ID->value);
        }

        if ($order->getDisplayID() != $displayID) {
            throw new \InvalidArgumentException(Feedback::INVALID_ORDER_ID->value);
        }
    }

    private function validateStatus(Order $order, string $status): void
    {
        $status = PaymentStatus::set($status);

        switch ($status) {
            case PaymentStatus::PENDING->name:
            case PaymentStatus::CANCELED->name:
            case PaymentStatus::PROCESSING->name:
            case PaymentStatus::REFUNDED->name:
            case PaymentStatus::DENIED->name:
                $this->updateStatusAndSave($order, $status);
                throw new \InvalidArgumentException($status . " " . $order->getDisplayID());
        }

        if ($order->getStatus() == PaymentStatus::COMPLETED->value || 
            $order->getStatus() == PaymentStatus::PAID->value) {
            throw new \InvalidArgumentException(Feedback::ALREADY_COMPLETED->value);
        }
    }

    private function validatePriceCents(Order $order, string|int $price): void
    {
        $orderPriceCents = number_format($order->getPrice(), 2, '');

        if ($orderPriceCents != $price) {
            throw new \InvalidArgumentException(Feedback::INVALID_ORDER_PRICE->value);
        }
    }

    private function validatePrice(Order $order, string|int $price): void
    {
        $orderPrice = $order->getPrice();

        if ($orderPrice != $price) {
            throw new \InvalidArgumentException(Feedback::INVALID_ORDER_PRICE->value);
        }
    }

    private function updateStatusAndSave(Order $order, string $status): void
    {
        $order->setStatus(PaymentStatus::set($status));
        $this->orderService->update($order);
    }

    private function validatePayPalEmail(string $emailFromRequest): void
    {
        if ($emailFromRequest != PAYPAL_ACCOUNT_EMAIL) {
            throw new \InvalidArgumentException("O E-mail associado a conta paypal não confere.");
        }
    }

    public function handlePix(array $dataFromRequest): void
    {
        $response = $this->processPixNotification($dataFromRequest);

        $transactionID = $response['status_request']['transaction_id'];
        $displayID = $response['status_request']['order_id'];
        $status = $response['status_request']['status'];
        $price = $response['status_request']['value_cents'];
        // $payerEmail = $response['status_request']['payer_email'];

        Link::validate($displayID);

        $order = $this->orderService->getOrder($displayID);
        $this->validateTransactionAndDisplayID($order, $transactionID, $displayID);

        $this->validateStatus($order, $status);
        $this->updateStatusAndSave($order, $status);

        $this->validatePriceCents($order, $price);

        $account = $this->accountService->getUserDataByLogin($order->getLogin());
        $this->updateAccountBalance($account, $order->getCoins(), $order->getDragonCoins());

        $this->insertCoinReward($account, $order->getProduct());
    }

    public function handlePaypal(array $dataFromRequest): void
    {
        $paypal = new Paypal();
        $bodyRequest = $paypal->buildRequestBody($dataFromRequest);

        if ($paypal->validateRequest($bodyRequest) === false) {
            throw new \InvalidArgumentException("Falha ao processar notificação paypal.");
        }

        $status = $dataFromRequest['payment_status'];
        $itemName = $dataFromRequest['item_name']; //TODO Se informado o link do pacote na criação do botão, podemos verificar essa informação.
        $itemPrice = $dataFromRequest['mc_gross']; 
        $receiverEmail = $dataFromRequest['receiver_email'];
        $displayID = $dataFromRequest['custom'];

        Link::validate($displayID);

        $order = $this->orderService->getOrder($displayID);
        
        $this->validateStatus($order, $status);
        $this->updateStatusAndSave($order, $status);
        
        $this->validatePrice($order, $itemPrice);
        $this->validatePayPalEmail($receiverEmail);
        
        $account = $this->accountService->getUserDataByLogin($order->getLogin());
        $this->updateAccountBalance($account, $order->getCoins(), $order->getDragonCoins());

        $this->insertCoinReward($account, $order->getProduct());
    }

    public function handleManual(array $dataFromRequest): void
    {
        $order = $this->orderService->getOrder($dataFromRequest['displayID']);
        $account = $this->accountService->getUserDataByLogin($order->getLogin());

        $status = 'Completed';

        $this->validateStatus($order, $status);

        $this->updateStatusAndSave($order, $status);
        
        $this->updateAccountBalance($account, $order->getCoins(), $order->getDragonCoins());
        $this->accountService->update($account);

        $this->insertCoinReward($account, $order->getProduct());
    }

    private function insertCoinReward(Account $account, Link $product): void
    {
        $coinsBundle = $this->coinService->getItemByLink($product);

        if (is_null($coinsBundle) || empty($coinsBundle)) {
            return;
        }

        $this->itemAwardService->insertCoinReward($coinsBundle, $account);
    }
}
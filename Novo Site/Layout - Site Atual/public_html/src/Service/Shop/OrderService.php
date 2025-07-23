<?php

namespace App\Service\Shop;

use App\Entity\Account\Login;
use App\Entity\Post\Link;
use App\Entity\Shop\Order;
use App\Helper\Feedback;
use App\Helper\PaymentMethod;
use App\Helper\PaymentStatus;
use App\Helper\UniqueIDGenerator;
use App\Repository\OrderRepository;
use App\Repository\ShopCoinsRepository;
use App\Service\AccountService;
use App\Infra\Payment\Pix;

class OrderService
{
    public function __construct(
        private ShopCoinsRepository $shopCoinsRepository,
        private OrderFactory $orderFactory,
        private OrderRepository $orderRepository,
        private AccountService $accountService
    ){}

    public function create(array $dataFromRequest): string
    {
        $order = $this->orderFactory->create($dataFromRequest);
        $order->setDisplayID($this->checkDisplayIDIsUnique()); 

        $transactionID = $this->createOrderInvoice($order, $dataFromRequest);

        $order->setTransactionID($transactionID);
        $this->orderRepository->create($order);

        return $order->getDisplayID();
    }

    public function getPixPaymentOptionsForIncompleteOrder(Order $order): array
    {
        if ($order->getPaymentMethod() != PaymentMethod::PIX->name) {
            return [];
        }

        if ($order->getStatus() != PaymentStatus::PENDING->value && 
            $order->getStatus() != PaymentStatus::PROCESSING->value){
            return [];
        }

        $pix = new Pix($order, null);
        $invoice = $pix->requestInvoiceDetails();

        if (empty($invoice)) {
            return [];
        }

        return [
            'qrCode' => $invoice['status_request']['pix_code']['qrcode_base64'],
            'code'   => $invoice['status_request']['pix_code']['emv']
        ];
    }

    private function createOrderInvoice(Order $order, array $dataFromRequest): string
    {
        $paymentMethod = $order->getPaymentMethod();

        switch ($paymentMethod) {
            case PaymentMethod::PIX->name:
                return $this->createPixInvoice($order, $dataFromRequest); //Retorna o transaction ID 
            case PaymentMethod::PAYPAL->name:
                return $order->getTransactionID(); //Retorna o ID do botão paypal.
            default:
            throw new \InvalidArgumentException(Feedback::FAILED_TO_CREATE_PRODUCT->value);
        }
    }

    private function createPixInvoice(Order $order, array $dataFromRequest): string
    {
        if (!isset($dataFromRequest['name']) || !isset($dataFromRequest['cpf'])) {
            throw new \Exception(Feedback::FAILED_TO_CREATE_PIX_INVOICE->value);
        }

        $account = $this->accountService->getUserDataByLogin($_SESSION['login']);
        $pix = new Pix(
            $order,
            $account,
            $this->checkCustomerName($dataFromRequest['name']),
            $this->checkCustomerCPF($dataFromRequest['cpf'])
        );

        return $pix->requestCreateInvoice();
    }

    private function checkCustomerName(string $name): string
    {
        if (strlen($name) <= 1 or strlen($name) > 120) {
            throw new \InvalidArgumentException(Feedback::INVALID_CUSTOMER_NAME->value);
        }

        return $name;
    }

    private function checkCustomerCPF(string $cpf): string
    {
        $cpf = str_replace(
            ['.', '-', ' '],
            [''],
            $cpf
        );

        if (strlen($cpf) != 11) {
            throw new \InvalidArgumentException(Feedback::INVALID_CUSTOMER_CPF->value);
        }

        return $cpf;
    }

    public function update(Order $order): void
    {
        $this->orderRepository->update($order);
    }

    private function checkDisplayIDIsUnique(): string
    {
        $displayID = UniqueIDGenerator::generateDisplayID();
        $result = $this->orderRepository->getByDisplayID($displayID);
        
        while (!empty($result)) {
            $displayID = UniqueIDGenerator::generateDisplayID();
            $result = $this->orderRepository->getByDisplayID($displayID);
        }

        return $displayID;
    }

    public function getOrdersByLogin(Login $login): array
    {
        $orders = [];
        $dataFromDatabase = $this->orderRepository->getByLogin($login);

        foreach ($dataFromDatabase as $order) {
            $orders[] = Order::createFromArray($order);
        }
        return $orders;
    }

    public function getOrder(string $displayID): Order
    {
        $dataFromDatabase = $this->orderRepository->getByDisplayID($displayID);
        $order = Order::createFromArray($dataFromDatabase);

        return $order;
    }

    public function listAll(int $limit): array
    {
        $dataFromDatabase = $this->orderRepository->list();
        $orders = [];
        foreach ($dataFromDatabase as $order) {
            $orders[] = Order::createFromArray($order);
        }

        return $orders;
    }

    public function ordersReport(): array
    {
        return [
            'moneyReceived' => $this->orderRepository->amountMoneyReceived(),
            'successfulSales' => $this->orderRepository->successSales(),
            'unsuccessfulSales' => $this->orderRepository->unsuccessfulSales(),
            'mostPurcharsedCoins' => $this->orderRepository->mostPurchasedCoin()
        ];
    }

    public function search(array $dataFromRequest): array
    {
        Link::validate($dataFromRequest['displayID']);

        $orders = [];
        $dataFromDatabase = $this->orderRepository->getOrderOnSearch($dataFromRequest['displayID']);

        foreach ($dataFromDatabase as $order) {
            $orders[] = Order::createFromArray($order);
        }

        return $orders;
    }

}   
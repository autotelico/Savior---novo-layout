<?php

namespace App\Service\Shop;

use App\Entity\Post\Link;
use App\Entity\Shop\Coin;
use App\Entity\Shop\Order;
use App\Helper\BonusCalculator;
use App\Helper\PaymentMethod;
use App\Helper\PaymentStatus;
use App\Repository\ShopCoinsRepository;

class OrderFactory
{
    public function __construct(
        private ShopCoinsRepository $shopCoinsRepository,
        private BonusCalculator $bonusCalculator
    ){}

    public function create(array $dataFromRequest): Order
    {
        //Cria o link, limpando e alterando caracteres pré-definidos.
        $productLink = new Link($dataFromRequest['product']);
        
        //Recupera o pacote de moedas pelo link
        $productCoin = Coin::createFromArray($this->shopCoinsRepository->getByLink($productLink));

        //Verifica se a forma de pagamento é válida
        $paymentMethod = PaymentMethod::get($dataFromRequest['paymentMethod']);

        //Cria o pedido e retorna para continuar o processo
        $order = new Order(
            $_SESSION['login'],
            $productCoin->getItemLink(),
            $paymentMethod,
            PaymentStatus::PENDING->name,
            $productCoin->getPrice(),
            $this->bonusCalculator->calculateBonusPercent($productCoin->getCoinsAmount(), $paymentMethod->name), //Precisa ser calculado o valor bônus.
            $productCoin->getDragonCoinsAmount(),
            new \DateTime()
        );

        return $order->setTransactionID($productCoin->getPaypalBtn());
    }
}
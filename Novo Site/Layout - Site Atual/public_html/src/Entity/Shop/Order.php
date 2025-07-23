<?php

namespace App\Entity\Shop;

use App\Entity\Account\Login;
use App\Entity\Post\Link;
use App\Helper\PaymentMethod;
use App\Helper\PaymentStatus;

class Order
{
    private int $id = 0;
    private string $transactionID = '';
    private string $displayID = '';

    public function __construct(
        private Login $login,
        private Link $product,
        private PaymentMethod $paymentMethod,
        private string $status,
        private float $price,
        private int $coins,
        private int $dragonCoins,
        private \DateTimeInterface $date
    ) {}

    public static function createFromArray(array $data): self
    {
        $order = new self(
            new Login($data['login']),
            new Link($data['product']),
            PaymentMethod::get($data['paymentMethod']),
            PaymentStatus::get($data['status']),
            $data['price'],
            $data['coins'],
            $data['dragonCoins'],
            new \DateTime($data['date'])
        );
        return $order->setId($data['id'])
            ->setTransactionID($data['transactionId'])
            ->setDisplayID($data['displayID']);
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function setId(int $id): self
    {
        $this->id = $id;

        return $this;
    }

    public function getLogin(): Login
    {
        return $this->login;
    }

    public function setLogin(Login $login): self
    {
        $this->login = $login;
        return $this;
    }

    public function getProduct(): Link
    {
        return $this->product;
    }

    public function setProduct(Link $product): self
    {
        $this->product = $product;
        return $this;
    }

    public function getPaymentMethod(): string
    {
        return $this->paymentMethod->name;
    }

    public function setPaymentMethod(PaymentMethod $paymentMethod): self
    {
        $this->paymentMethod = $paymentMethod;
        return $this;
    }

    public function getTransactionID(): string
    {
        return $this->transactionID;
    }

    public function setTransactionID(string $transactionID): self
    {
        $this->transactionID = $transactionID;
        return $this;
    }

    public function getStatus(): string
    {
        return $this->status;
    }

    public function setStatus(string $status): self
    {
        $status = PaymentStatus::set($status);
        $this->status = $status;
        return $this;
    }

    public function getPrice(): float
    {
        return $this->price;
    }

    public function setPrice(float $price): self
    {
        $this->price = $price;
        return $this;
    }

    public function getCoins(): int
    {
        return $this->coins;
    }

    public function setCoins(int $coins): self
    {
        $this->coins = $coins;
        return $this;
    }

    public function getDragonCoins(): int
    {
        return $this->dragonCoins;
    }

    public function setDragonCoins(int $dragonCoins): self
    {
        $this->dragonCoins = $dragonCoins;
        return $this;
    }

    public function getDate(): string
    {
        return $this->date->format('Y-m-d H:i:s');
    }

    public function setDate(\DateTimeInterface $date): self
    {
        $this->date = $date;
        return $this;
    }

    public function getDisplayID(): string
    {
        return $this->displayID;
    }

    public function setDisplayID(string $displayID): self
    {
        $this->displayID = $displayID;
        return $this;
    }
}
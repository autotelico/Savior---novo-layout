<?php

namespace App\Repository;

use App\Entity\Account\Login;
use App\Entity\Shop\Order;
use App\Infra\Database\DatabaseConnection;

class OrderRepository
{
    public function __construct(
        private DatabaseConnection $conn
    ){}

    public function create(Order $order): void
    {
        $this->conn->count("INSERT INTO " . DB_ARK . ".orders (login, product, paymentMethod, transactionId, status, displayID, price, coins, dragonCoins, date) VALUES (:LOGIN, :PRODUCT, :PAYMENT, :TRANSACTION_ID, :STATUS, :DISPLAY_ID, :PRICE, :COINS, :DCOINS, :DATE)", [
            ':LOGIN'          => $order->getLogin(),
            ':PRODUCT'        => $order->getProduct(),
            ':PAYMENT'        => $order->getPaymentMethod(),
            ':TRANSACTION_ID' => $order->getTransactionID(),
            ':STATUS'         => $order->getStatus(),
            ':DISPLAY_ID'     => $order->getDisplayID(),
            ':PRICE'          => $order->getPrice(),
            ':COINS'          => $order->getCoins(),
            ':DCOINS'         => $order->getDragonCoins(),
            ':DATE'           => $order->getDate()
        ]);
    }

    public function update(Order $order): void
    {
        $this->conn->count("UPDATE " . DB_ARK . ".orders SET login = :LOGIN, product = :PRODUCT, paymentMethod = :PAYMENT, transactionId = :TRANSACTION_ID, status = :STATUS, displayID = :DISPLAY_ID, price = :PRICE, coins = :COINS, dragonCoins = :DCOINS, date = :DATE WHERE id = :ID", [
            ':LOGIN'          => $order->getLogin(),
            ':PRODUCT'        => $order->getProduct(),
            ':PAYMENT'        => $order->getPaymentMethod(),
            ':TRANSACTION_ID' => $order->getTransactionID(),
            ':STATUS'         => $order->getStatus(),
            ':DISPLAY_ID'     => $order->getDisplayID(),
            ':PRICE'          => $order->getPrice(),
            ':COINS'          => $order->getCoins(),
            ':DCOINS'         => $order->getDragonCoins(),
            ':DATE'           => $order->getDate(),
            ':ID'             => $order->getId(),
        ]);
    }

    public function list(int $limit = 5): mixed
    {
        return $this->conn->selectAll("SELECT * FROM " . DB_ARK . ".orders ORDER BY id DESC LIMIT :LIMIT", [
            ':LIMIT' => $limit
        ]);
    }

    public function getByLogin(Login $login, int $limit = 30): mixed
    {
        return $this->conn->selectAll("SELECT * FROM " . DB_ARK . ".orders WHERE login = :LOGIN ORDER BY id DESC LIMIT :LIMIT", [
            ':LOGIN' => $login,
            ':LIMIT' => $limit
        ]);
    }

    public function getByDisplayID(string $displayID): mixed
    {
        return $this->conn->select("SELECT * FROM " . DB_ARK . ".orders WHERE displayID = :DISPLAYID", [
            ':DISPLAYID' => $displayID
        ]);
    }

    public function amountMoneyReceived(): mixed
    {
        return $this->conn->select("SELECT SUM(orders.price) AS total FROM " . DB_ARK . ".orders WHERE status = 'COMPLETED' OR status = 'PAID';")['total'];
    }

    public function successSales(): mixed
    {
        return $this->conn->count("SELECT id FROM " . DB_ARK . ".orders WHERE status = 'COMPLETED' OR status = 'PAID';");
    }

    public function unsuccessfulSales(): mixed
    {
        return $this->conn->count("SELECT id FROM " . DB_ARK . ".orders WHERE status != 'COMPLETED' AND status != 'PAID';");
    }

    public function mostPurchasedCoin(): mixed
    {
        return $this->conn->selectAll("SELECT coins, COUNT(id) AS total FROM " . DB_ARK . ".orders WHERE status = 'COMPLETED' OR status = 'PAID' GROUP BY coins;");
    }

    public function getOrderOnSearch(string $loginOrDisplayID, int $limit = 30): mixed
    {
        return $this->conn->selectAll("SELECT * FROM " . DB_ARK . ".orders WHERE login = :LOGIN OR displayID = :ID ORDER BY id DESC LIMIT :LIMIT", [
            ':LOGIN' => $loginOrDisplayID,
            ':ID' => $loginOrDisplayID,
            ':LIMIT' => $limit,
        ] );
    }
}
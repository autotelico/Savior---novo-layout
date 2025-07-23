<?php

namespace App\Repository;

use App\Entity\Post\Link;
use App\Entity\Shop\Coin;
use App\Helper\Feedback;
use App\Infra\Database\DatabaseConnection;
use App\Infra\Database\UniqueConstraintException;

class ShopCoinsRepository
{
    public function __construct(
        private DatabaseConnection $conn
    ){}

    public function create(Coin $coins): void
    {
        try {
            $this->conn->count("INSERT INTO " . DB_ARK . ".shop_coins (item_name, item_link, coins_amount, dragon_coins_amount, price, cash_reward, paypal_btn) VALUES (:INAME, :ILINK, :COINS, :DCOINS, :PRICE, :CASH_REWARD, :PAYPAL)", [
                ':INAME' => $coins->getItemName(),
                ':ILINK' => $coins->getItemLink(),
                ':COINS' => $coins->getCoinsAmount(),
                ':DCOINS' => $coins->getDragonCoinsAmount(),
                ':PRICE' => $coins->getPrice(),
                ':CASH_REWARD' => $coins->getCashReward(),
                ':PAYPAL' => $coins->getPaypalBtn()
            ]);
            
        } catch (\Exception $e) {
            if ($e->getCode() === '23000') {
                throw new UniqueConstraintException(Feedback::UNIQUE_CONSTRAINT_ERROR->value, $e->getCode());
            }
            throw $e;
        }
        
    }

    public function update(Coin $coins): void
    {
        try {
            $this->conn->count("UPDATE " . DB_ARK . ".shop_coins SET item_name = :INAME, item_link = :ILINK, coins_amount = :COINS, dragon_coins_amount = :DCOINS, price = :PRICE, cash_reward = :CASH_REWARD, views = :VIEWS, paypal_btn = :PAYPAL WHERE item_link = :LINK", [
                ':INAME' => $coins->getItemName(),
                ':ILINK' => $coins->getItemLink(),
                ':COINS' => $coins->getCoinsAmount(),
                ':DCOINS' => $coins->getDragonCoinsAmount(),
                ':PRICE' => $coins->getPrice(),
                ':CASH_REWARD' => $coins->getCashReward(),
                ':LINK' => $coins->getItemLink(),
                ':VIEWS' => $coins->getViews(),
                ':PAYPAL' => $coins->getPaypalBtn()
            ]);
            
        } catch (\Exception $e) {
            if ($e->getCode() === '23000') {
                throw new UniqueConstraintException(Feedback::UNIQUE_CONSTRAINT_ERROR->value, $e->getCode());
            }
            throw $e;
        }
    }

    public function list(int $limit = 100): mixed
    {
        return $this->conn->selectAll("SELECT * FROM " . DB_ARK . ".shop_coins cShop
        LEFT JOIN " . DB_ARK . ".cash_reward cReward ON cReward.id = cShop.cash_reward ORDER BY cShop.price LIMIT :LIMIT", [
            ':LIMIT' => $limit
        ]);
    }

    public function getByLink(Link $link): mixed
    {
        return $this->conn->select("SELECT * FROM " . DB_ARK . ".shop_coins cShop
        LEFT JOIN " . DB_ARK . ".cash_reward cReward ON cReward.id = cShop.cash_reward WHERE item_link = :LINK", [
            ':LINK' => $link
        ]);
    }

    public function delete(Coin $coins): void
    {
        $this->conn->count("DELETE FROM " . DB_ARK . ".shop_coins WHERE item_link = :LINK", [
            ':LINK' => $coins->getItemLink()
        ]);
    }
}
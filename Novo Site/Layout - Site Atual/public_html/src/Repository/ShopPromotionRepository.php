<?php

namespace App\Repository;

use App\Infra\Database\DatabaseConnection;

class ShopPromotionRepository
{
    public function __construct(
        private DatabaseConnection $conn
    ){}

    public function updateBonusPayment(int $pix, int $paypal): void
    {
        $this->conn->count("UPDATE " . DB_ARK . ".shop_coins_bonus SET pix = :PIX, paypal = :PAYPAL",[
            ':PIX' => $pix,
            ':PAYPAL' => $paypal
        ]);
    }

    public function getBonusPayment(): mixed
    {
        return $this->conn->select("SELECT * FROM " . DB_ARK . ".shop_coins_bonus");
    }
}
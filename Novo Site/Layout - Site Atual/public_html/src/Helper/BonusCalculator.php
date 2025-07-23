<?php

namespace App\Helper;

use App\Repository\ShopPromotionRepository;

class BonusCalculator
{
    public function __construct(
        private ShopPromotionRepository $shopPromotionRepository
    ){}

    public function calculateBonusPercent(int $coinsAmount, string $paymentMethod): int
    {
        $paymentMethod = strtolower($paymentMethod);
        $bonus = $this->shopPromotionRepository->getBonusPayment()[$paymentMethod];
        return round($coinsAmount + ($coinsAmount * ($bonus / 100)));
    }
}
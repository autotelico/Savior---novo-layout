<?php

namespace App\Service\Shop;

use App\Repository\ShopPromotionRepository;

class PromotionService
{
    public function __construct(
        private ShopPromotionRepository $shopPromotionRepository
    ){}

    public function updateCoinsBonus(array $dataFromRequest): void
    {
        $pix = (int) $dataFromRequest['pix'];
        $paypal = (int) $dataFromRequest['paypal'];

        $this->shopPromotionRepository->updateBonusPayment($pix, $paypal);
    }

    public function getCoinBonus(): array
    {
        return $this->shopPromotionRepository->getBonusPayment();
    }
}
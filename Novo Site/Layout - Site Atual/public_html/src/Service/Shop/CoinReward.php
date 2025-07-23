<?php

namespace App\Service\Shop;

use App\Helper\Feedback;
use App\Repository\ShopCoinsRewardRepository;

class CoinReward
{
    public function __construct(
        private ShopCoinsRewardRepository $shopCoinsRewardRepository
    ){}

    public function create(array $dataFromRequest): void
    {
        $this->checkIsValidReward($dataFromRequest);
        $dbFormatVnum = $this->formatToDatabase($dataFromRequest['vnum']);
        $dbFormatAmount = $this->formatToDatabase($dataFromRequest['amount']);

        $this->shopCoinsRewardRepository->create($dataFromRequest['name'], $dbFormatVnum, $dbFormatAmount);
    }

    private function checkIsValidReward(array $dataFromRequest): void
    {
        $vnum = $dataFromRequest['vnum'];
        $amount = $dataFromRequest['amount'];

        if (count($vnum) !== count($amount)) {
            throw new \InvalidArgumentException(Feedback::INVALID_CASH_REWARD->value);
        }
    }

    private function formatToDatabase(array $data): string
    {
        return implode(',', $data);
    }

    private function formatFromDatabase(array $data): array
    {
        $dataFormated = [];

        foreach ($data as $key) {
            $dataFormated[] = [
                'id'     => $key['id'],
                'name'   => $key['name'],
                'vnum'   => explode(',', $key['vnum']),
                'amount' => explode(',', $key['amount']),
            ];
        }

        return $dataFormated;
    }

    public function list(): array
    {
        $dataFromDatabase = $this->shopCoinsRewardRepository->list();
        return $this->formatFromDatabase($dataFromDatabase);
    }

    public function delete(array $dataFromRequest): void
    {
        $id = $dataFromRequest['id'];
        $this->shopCoinsRewardRepository->delete($id);
    }

}
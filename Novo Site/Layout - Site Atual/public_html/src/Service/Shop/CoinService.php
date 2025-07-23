<?php

namespace App\Service\Shop;

use App\Entity\Post\Link;
use App\Entity\Shop\Coin;
use App\Repository\ShopCoinsRepository;
use App\Repository\ShopPromotionRepository;

class CoinService
{
    public function __construct(
        private ShopCoinsRepository $shopCoinsRepository,
        private ShopPromotionRepository $shopPromotionRepository
    ){}

    public function create(array $dataFromArray): void
    {
        $coinsPack = Coin::createFromArray($dataFromArray);
        $this->shopCoinsRepository->create($coinsPack);
    }

    //Todo 
    public function getItemByLink(string $link): ?Coin
    {
        $link = new Link($link);

        $dataFromDatabase = $this->shopCoinsRepository->getByLink($link);

        if (empty($dataFromDatabase)) {
            // throw new \UnexpectedValueException(Feedback::INVALID_COIN_ID->value);
            return null;
        }
        
        return Coin::createFromArray($dataFromDatabase);
    }

    public function list(array $dataFromRequest = []): ?array
    {
        $coinsPack = [];

        $dataFromDatabase = $this->shopCoinsRepository->list();
        foreach ($dataFromDatabase as $item) {
            $coinsPack[] = Coin::createFromArray($item);
        }

        return $coinsPack;
    }

    public function delete(array $dataFromRequest): void
    {
        Link::validate($dataFromRequest['item_link']);
        
        $coinsPack = $this->getItemByLink($dataFromRequest['item_link']);
        $this->shopCoinsRepository->delete($coinsPack);
    }

    public function checkout(string $product): Coin
    {
        Link::validate($product);
        $dataFromDatabase = $this->shopCoinsRepository->getByLink(new Link($product));

        if (empty($dataFromDatabase)) {
            throw new \UnexpectedValueException();
        }

        $coin = Coin::createFromArray($dataFromDatabase);
        $coin->setViews($coin->getViews() + 1);

        $this->shopCoinsRepository->update($coin);
        return $coin;
    }

    public function coinsBonusPayment(): array
    {
        return $this->shopPromotionRepository->getBonusPayment();
    }
}
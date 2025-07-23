<?php

namespace App\Service;

use App\Entity\Account\Account;
use App\Entity\Shop\Coin;
use App\Entity\Shop\ItemAward;
use App\Repository\ItemAwardRepository;
use App\Repository\PlayerRepository;

class ItemAwardService
{
    public function __construct(
        private PlayerRepository $playerRepository,
        private ItemAwardRepository $itemAwardRepository,
        private array $items = []
    ){}


    public function insertCoinReward(Coin $coin, Account $account): void
    {
        //Não tem suporte a itens com tempo.
        foreach ($coin->getVnumAndAmount() as $vnum => $amount) {
            $this->items[] = new ItemAward(
                $account->getLogin(),
                $vnum,
                $amount,
                new \DateTime(),
                "Cash Premiado",
                ItemAward::NO_SOCKET,
                ItemAward::NO_SOCKET,
                ItemAward::NO_SOCKET,
                ItemAward::MALL
            );
        }

        $this->insert();
        unset($this->items);
    }
    
    private function insert(): void
    {
        foreach ($this->items as $item) {
            $this->itemAwardRepository->create($item);
        }
    }

}
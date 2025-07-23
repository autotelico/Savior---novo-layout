<?php

namespace App\Repository;

use App\Entity\Account\Account;
use App\Entity\Shop\Item;
use App\Entity\Shop\ItemAward;
use App\Infra\Database\DatabaseConnection;

class ItemAwardRepository
{
    public function __construct(
        private DatabaseConnection $conn,
    ){}

    public function create(ItemAward $item): void
    {
        $this->conn->count("INSERT INTO " . DB_PLAYER . ".item_award (login, vnum, count, given_time, why, socket0, socket1, socket2, mall) VALUES (:LOGIN, :VNUM, :COUNT, :GIVEN_TIME, :WHY, :SOCKET0, :SOCKET1, :SOCKET2, :MALL)", [
            ':LOGIN'      => $item->getLogin(),
            ':VNUM'       => $item->getVnum(),
            ':COUNT'      => $item->getCount(),
            ':GIVEN_TIME' => $item->getGivenTime(),
            ':WHY'        => $item->getWhy(),
            ':SOCKET0'    => $item->getSocket0(),
            ':SOCKET1'    => $item->getSocket1(),
            ':SOCKET2'    => $item->getSocket2(),
            ':MALL'       => $item->getMall(),
        ]);
    }

    
}
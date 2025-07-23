<?php

namespace App\Entity\Shop;

use App\Entity\Account\Login;

class ItemAward
{
    const NO_SOCKET = 0;
    const MALL = 1;

    public function __construct(
        private Login $login,
        private int $vnum,
        private int $count,
        private \DateTimeInterface $givenTime,
        private string $why,
        private int $socket0,
        private int $socket1,
        private int $socket2,
        private int $mall,
    ){}

    public function getLogin(): string
    {
        return $this->login->__toString();
    }

    public function getVnum(): int
    {
        return $this->vnum;
    }

    public function getCount(): int
    {
        return $this->count;
    }

    public function getGivenTime(): string
    {
        return $this->givenTime->format('Y-m-d H:i:s');
    }

    public function getWhy(): string
    {
        return $this->why;
    }
    
    public function getSocket0(): int
    {
        return $this->socket0;
    }
    
    public function getSocket1(): int
    {
        return $this->socket1;
    }
    
    public function getSocket2(): int
    {
        return $this->socket2;
    }

    public function getMall(): int
    {
        return $this->mall;
    }
}
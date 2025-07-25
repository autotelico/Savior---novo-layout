<?php

namespace App\Helper;

trait ItemName
{
    public function itemNameList(int $vnum): string
    {
        switch ($vnum) {
            default:
                $itemNames = include ItemNameConfig::ITEM_NAMES;
                return $itemNames[$vnum] ?? '';
        }
        
    }
}


<?php

namespace App\Helper;

trait ItemName
{
    const ITEM_NAMES = 'icon_shop/item_names.php';

    public function itemNameList(int $vnum): string
    {
        switch ($vnum) {
            default:
                $itemNames = include self::ITEM_NAMES;
                return $itemNames[$vnum] ?? '';
        }
        
    }
}


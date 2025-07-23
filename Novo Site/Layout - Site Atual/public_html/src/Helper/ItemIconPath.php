<?php

namespace App\Helper;

trait ItemIconPath
{
    const FILE = 'icon_shop/item_list.php';
    const ITEM_LIST = 'icon_shop/item_list.txt';

    public function IconFullPath(int $vnum): string
    {
        switch ($vnum) {
            default:
                $itemList = include self::FILE;
                return $itemList[$vnum] ?? '';
        }
    }
}


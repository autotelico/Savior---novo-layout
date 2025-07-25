<?php

namespace App\Helper;

trait ItemIconPath
{

    public function IconFullPath(int $vnum): string
    {
        switch ($vnum) {
            default:
                $itemList = include ItemIconConfig::FILE;
                return $itemList[$vnum] ?? '';
        }
    }
}


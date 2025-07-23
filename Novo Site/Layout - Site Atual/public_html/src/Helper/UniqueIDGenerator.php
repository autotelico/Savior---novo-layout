<?php

namespace App\Helper;

class UniqueIDGenerator
{
    public static function generateDisplayID(int $length = 8): string
    {
        $characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
        $displayID = '';
    
        for ($i = 0; $i < $length; $i++) {
            $randomIndex = rand(0, strlen($characters) - 1);
            $displayID .= $characters[$randomIndex];
        }
    
        return $displayID;
    }

    
}
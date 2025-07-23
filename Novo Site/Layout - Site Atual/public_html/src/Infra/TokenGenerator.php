<?php

namespace App\Infra;

class TokenGenerator 
{
    public static function generate(): void
    {
        $_SESSION['token'] = bin2hex(random_bytes(32));
    }
}
<?php

namespace App\Infra;

use App\Helper\Feedback;

class TokenValidator 
{
    public static function validate(?string $token): void
    {
        if (empty($token) || is_null($token) || $_SESSION['token'] !== $token) {
            throw new \InvalidArgumentException(Feedback::INVALID_TOKEN->value);
        }
    }
}
<?php

namespace App\Entity\Account;

use App\Helper\Feedback;

class CharCode implements \Stringable
{
    public function __construct(private int $charCode)
    {
        if (!$this->validate($charCode)) {
            throw new \InvalidArgumentException(Feedback::INVALID_CHARCODE->value);
        }

        $this->charCode = $charCode;
    }

    public function __toString(): string
    {
        return (string)$this->charCode;
    }

    private function validate(int $charCode): bool
    {
        return strlen($charCode) === 7; 
    }

    public static function rand(): int 
    {
        return rand(1111111, 9999999);
    }
}
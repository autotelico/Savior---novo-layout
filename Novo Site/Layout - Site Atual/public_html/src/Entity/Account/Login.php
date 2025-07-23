<?php

namespace App\Entity\Account;

use App\Helper\Feedback;

class Login implements \Stringable
{
    public function __construct(private ?string $login)
    {
        if ($login === null) {
            throw new \InvalidArgumentException(Feedback::INVALID_LOGIN->value);
        }

        if (!$this->validate($login)) {
            throw new \InvalidArgumentException(Feedback::INVALID_LOGIN->value);
        }
        
        $this->login = $login;
    }

    public function __toString(): string
    {
        return $this->login;
    }

    private function validate(string $login): bool
    {
        // $pattern = "/^[a-zA-Z][a-zA-Z0-9]{3,16}$/";
        $pattern = "/^[a-zA-Z0-9]{3,16}$/";
        return preg_match($pattern, $login);
    }
}

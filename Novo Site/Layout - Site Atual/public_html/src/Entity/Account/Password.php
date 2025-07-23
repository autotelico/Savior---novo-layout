<?php

namespace App\Entity\Account;

use App\Helper\Feedback;

class Password implements \Stringable
{
    public function __construct(private ?string $password, bool $hashed = false)
    {
        if ($password === null) {
            throw new \InvalidArgumentException(Feedback::INVALID_PASSWORD->value);
        }

        if ($hashed) {
            $this->password = $password;
            return;
        } 

        if (!$this->validate($password)) {
            throw new \InvalidArgumentException(Feedback::INVALID_PASSWORD->value);
        }

        $this->password = $this->hash($password);
    }

    public function __toString(): string
    {
        return $this->password;
    }

    private function validate(string $password): bool
    {
        // $pattern = "/^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*[@!#$%&(){}*+,-.:;<>=?^_|~]){7,16}.+$/";
        $pattern = "/^[a-zA-Z0-9@!#$%&(){}*+,-.:;<>=?^_|~]{7,16}$/";

        
        return preg_match($pattern, $password);
    }

    private function hash(string $password): string
    {
        return strtoupper('*'.sha1(sha1($password, true)));
    }
    
}

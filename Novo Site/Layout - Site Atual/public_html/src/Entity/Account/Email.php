<?php

namespace App\Entity\Account;
use App\Helper\Feedback;

class Email implements \Stringable
{
    public function __construct(private ?string $email)
    {
        if ($email === null) {
            throw new \InvalidArgumentException(Feedback::INVALID_EMAIL->value);
        }

        if (!$this->validate($email)) {
            throw new \InvalidArgumentException(Feedback::INVALID_EMAIL->value);
        }

        $this->email = $email;
    }

    public function __toString(): string
    {
        return $this->email;
    }

    private function validate(string $email):bool
    {
        //check dns
        //log email suspeito
        return filter_var($email, FILTER_VALIDATE_EMAIL);
    }
}

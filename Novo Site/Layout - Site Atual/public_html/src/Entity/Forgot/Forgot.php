<?php

namespace App\Entity\Forgot;

use App\Entity\Account\Login;

class Forgot
{
    const UNNAVAILABLE = 0;
    const AVAILABLE = 1;

    public function __construct(
        private ?int $id,
        private string $hint,
        private string $code,
        private \DateTimeInterface $date,
        private int $available,
        private Login $who
    )
    {}

    public static function createFromArray(array $data): self
    {
        return new self(
            $data['id'],
            $data['hint'],
            $data['code'],
            new \DateTime($data['date']),
            $data['available'],
            new Login($data['who'])
        );
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function setId(int $id): self
    {
        $this->id = $id;
        return $this;
    }

    public function getHint(): string
    {
        return $this->hint;
    }

    public function setHint(string $hint): self
    {
        $this->hint = $hint;
        return $this;
    }

    public function getCode(): string
    {
        return $this->code;
    }

    public function setCode(string $code): self
    {
        $this->code = $code;
        return $this;
    }

    public function getDate(): string
    {
        return $this->date->format('Y-m-d H:i:s');
    }

    public function setDate(\DateTimeInterface $date): self
    {
        $this->date = $date;
        return $this;
    }

    public function getAvailable(): int
    {
        return $this->available;
    }

    public function setAvailable(int $available): self
    {
        $this->available = $available;
        return $this;
    }

    public function getWho(): Login
    {
        return $this->who;
    }

    public function setWho(Login $who): self
    {
        $this->who = $who;
        return $this;
    }
}
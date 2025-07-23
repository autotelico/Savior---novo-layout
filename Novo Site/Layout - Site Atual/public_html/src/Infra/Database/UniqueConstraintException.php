<?php

namespace App\Infra\Database;

class UniqueConstraintException extends \Exception
{
    public function __construct(string $msg, int $code)
    {
        parent::__construct($msg, $code);
    }
}
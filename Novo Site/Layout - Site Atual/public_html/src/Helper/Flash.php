<?php

namespace App\Helper;

class Flash
{
    /**
     * Types - SweetAlert
     * success
     * error
     * warning
     * info
     * question
     */
    public static function getMsg(): ?array
    {
        $msg = $_SESSION['flash'] ?? NULL;
        if ($msg) {
            unset($_SESSION['flash']);
        }
        return $msg;
    }

    public static function setMsg(string $msg, string $type = 'success'): void
    {
        $_SESSION['flash'] = [$msg, $type];
    }
}
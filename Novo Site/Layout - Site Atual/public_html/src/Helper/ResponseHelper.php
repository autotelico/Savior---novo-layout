<?php

namespace App\Helper;

class ResponseHelper
{
    public static function success(string|Feedback $msg, bool $success = true, array $extra = []): string
    {
        return json_encode([
            'success' => $success,
            'msg'     => $msg,
            'token'   => $_SESSION['token'],
            'extra'   => $extra
        ]);
    }
}
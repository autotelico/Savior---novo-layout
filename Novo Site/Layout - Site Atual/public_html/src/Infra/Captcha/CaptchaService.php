<?php

namespace App\Infra\Captcha;

use App\Helper\Feedback;

class CaptchaService 
{
    private static string $url = "https://www.google.com/recaptcha/api/siteverify";

    public static function validate(?string $token): void
    {
        if (ENABLE_CAPTCHA === false) {
            return;
        }

        if (empty($token) || is_null($token)) {
            throw new \InvalidArgumentException(Feedback::INVALID_CAPTCHA->value);
        }
        
        $params = http_build_query([
            'secret' => CAPTCHA_PRIVATE_KEY,
            'response' => $token,
        ]);

        $url = self::$url . '?' . $params;
        $result = json_decode(file_get_contents($url));

        if ($result->success === false) {
            throw new \UnexpectedValueException(Feedback::INVALID_CAPTCHA->value);
        }
    }
}
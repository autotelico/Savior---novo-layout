<?php

namespace App\Helper;

enum PaymentMethod {
    case PAYPAL;
    case PIX;

    private static function checkEmpty(mixed $name): void
    {
        if (is_null($name) || empty($name)) {
            throw new \Exception(Feedback::INVALID_PAYMENT_METHOD->value);
        }
    }

    public static function get(?string $name): self
    {
        self::checkEmpty($name);
        $name = strtoupper($name);

        return match ($name) {
            self::PAYPAL->name => self::PAYPAL,
            self::PIX->name    => self::PIX,
            default            => throw new \Exception(Feedback::INVALID_PAYMENT_METHOD->value)
        };
    }
}
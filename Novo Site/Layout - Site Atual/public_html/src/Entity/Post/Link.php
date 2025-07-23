<?php

namespace App\Entity\Post;

use App\Helper\Feedback;

class Link implements \Stringable
{
    public function __construct(private ?string $link)
    {
        if (is_null($link)) {
            throw new \InvalidArgumentException(Feedback::INVALID_LINK->value);
        }

        $this->link = self::sanitize($link);
    }

    public static function sanitize(string $link): string
    {
        $link = strtolower($link);

        $link = str_replace(
            ['!', '?', '&', 'ç', 'á', 'â', 'ã', 'à', 'é', 'ê', 'í', 'î', 'ó', 'ò', 'ô', 'õ', 'ú', 'ù', 'û', '.', ',', '(', ')', '+', "\n" ],
            ['', '', 'e', 'c', 'a', 'a', 'a', 'a', 'e', 'e', 'i', 'i', 'o', 'o', 'o', 'o', 'u', 'u', 'u', '', '', '', '', '', '-'],
            $link
        );

        $link = str_replace(
            [' '],
            ['-'],
            $link
        );

        return $link;
    }

    public static function validate(Link|string $link): void
    {
        $pattern = "/^[a-zA-Z0-9-]{3,80}$/";
        if (!preg_match($pattern, $link)) {
            throw new \InvalidArgumentException(Feedback::INVALID_LINK->value);
        }
    }

    public function __toString(): string
    {
        return $this->link;
    }
}
<?php

namespace App\Helper;

enum PostCategory: string 
{
    case NEWS = "Notícias";
    case EVENT = "Eventos";
    case UPDATE = "Atualizações";
    case TUTORIAL = "Tutoriais";

    //Retorna a lista de constantes
    public static function values(): array
    {
        $reflection = new \ReflectionClass(self::class);
        return $reflection->getConstants();
    }

    //Retorna o valor do enum 'Notícias'
    public static function getValue(string $name): string
    {
        return match($name) {
            self::NEWS->name     => self::NEWS->value,
            self::EVENT->name    => self::EVENT->value,
            self::UPDATE->name   => self::UPDATE->value,
            self::TUTORIAL->name => self::TUTORIAL->value,
            default              => throw new \InvalidArgumentException(Feedback::INVALID_POST_CATEGORY->value)
        };
    }

    //Retorna o nome do enum 'NEWS'
    public static function getName(string $value): string
    {
        return match($value) {
            self::NEWS->value     => self::NEWS->name,
            self::EVENT->value    => self::EVENT->name,
            self::UPDATE->value   => self::UPDATE->name,
            self::TUTORIAL->value => self::TUTORIAL->name,
            default               => throw new \InvalidArgumentException(Feedback::INVALID_POST_CATEGORY->value)
        };
    }
}
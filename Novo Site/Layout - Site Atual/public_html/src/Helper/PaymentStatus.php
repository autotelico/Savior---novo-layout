<?php

namespace App\Helper;

enum PaymentStatus: string 
{
    case COMPLETED = 'Concluído';
    case PAID = 'Pago';
    case PENDING = 'Pendente';
    case CANCELED = 'Cancelado';
    case PROCESSING = 'Em Processamento';
    case REFUNDED = 'Estornado';
    case DENIED = 'Negado';

    public static function get(string $name): string
    {
        $name = strtoupper($name);

        return match($name) {
            self::PENDING->name    => self::PENDING->value, 
            self::CANCELED->name   => self::CANCELED->value, 
            self::COMPLETED->name  => self::COMPLETED->value, 
            self::PAID->name       => self::PAID->value, 
            self::PROCESSING->name => self::PROCESSING->value, 
            self::REFUNDED->name   => self::REFUNDED->value, 
            self::DENIED->name     => self::DENIED->value, 
        };
    }

    public static function set(string $name): string
    {
        $name = strtoupper($name);

        return match($name) {
            self::PENDING->name    => self::PENDING->name, 
            self::CANCELED->name   => self::CANCELED->name, 
            self::COMPLETED->name  => self::COMPLETED->name, 
            self::PAID->name       => self::PAID->name, 
            self::PROCESSING->name => self::PROCESSING->name, 
            self::REFUNDED->name   => self::REFUNDED->name, 
            self::DENIED->name     => self::DENIED->name, 
        };
    }

    public static function getStatusHTMLBadge(string $value): string
    {
        return match($value) {
            self::COMPLETED->value   => '<li><span class="badge text-bg-success badge-success">'.self::COMPLETED->value.'</span></li>',
            self::PAID->value   => '<li><span class="badge text-bg-success badge-success">'.self::PAID->value.'</span></li>',
            self::PENDING->value   => '<li><span class="badge text-bg-warning badge-warning">'.self::PENDING->value.'</span></li>',
            self::CANCELED->value   => '<li><span class="badge text-bg-danger badge-danger">'.self::CANCELED->value.'</span></li>',
            self::PROCESSING->value   => '<li><span class="badge text-bg-warning badge-warning">'.self::PROCESSING->value.'</span></li>',
            self::REFUNDED->value   => '<li><span class="badge text-bg-danger badge-danger">'.self::REFUNDED->value.'</span></li>',
            self::DENIED->value   => '<li><span class="badge text-bg-danger badge-danger">'.self::DENIED->value.'</span></li>',
        };
    }
}
<?php

namespace App\Helper;

use Twig\Extension\AbstractExtension;
use Twig\TwigFunction;

class TwigFunctions extends AbstractExtension
{
    use ItemIconPath;
    use ItemName;

    public function getFunctions()
    {
        return [
            new TwigFunction('iconPath', [$this, 'iconPath']),
            new TwigFunction('itemName', [$this, 'itemName']),
            new TwigFunction('explode', [$this, 'explode']),
            new TwigFunction('postCategory', [$this, 'postCategory']),
            new TwigFunction('classJobToString', [$this, 'classJobToString']),
            new TwigFunction('minutesToHours', [$this, 'minutesToHours']),
            new TwigFunction('invoiceStatus', [$this, 'invoiceStatus']),
            new TwigFunction('getEmpireFlag', [$this, 'getEmpireFlag']),
            new TwigFunction('getClassImg', [$this, 'getClassImg']),
        ];
    }

    public function iconPath(int|string $vnum): string
    {
        if (empty($vnum)) {
            return '';
        }
        return $this->IconFullPath($vnum);
    }

    public function itemName(mixed $vnum): string
    {
        if (empty($vnum) || is_null($vnum)) {
            return '';
        }
        return $this->itemNameList($vnum);
    }

    public function explode(?string $data, string $separator = ','): array
    {
        if (is_null($data)) {
            return [];
        }
        return explode($separator, $data);
    }

    public function postCategory(string $categoryEnum): string
    {
        return PostCategory::getValue(strtoupper($categoryEnum));
    }

    public function classJobToString(int $job): string
    {
        return match ($job) {
            0 => "Guerreiro (M)",
            1 => "Ninja (F)",
            2 => "Shura (M)",
            3 => "Shaman (F)",
            4 => "Guerreiro (F)",
            5 => "Ninja (M)",
            6 => "Shura (F)",
            7 => "Shaman (M)",
            8 => "Lycan ",
            default => "-",
        };
    }

    public function getClassImg(int $job): string
    {
        return match ($job) {
            0 => "<img src='/images/icons/0.webp' alt='Classe' class='p-1'>",
            1 => "<img src='/images/icons/1.webp' alt='Classe' class='p-1'>",
            2 => "<img src='/images/icons/2.webp' alt='Classe' class='p-1'>",
            3 => "<img src='/images/icons/3.webp' alt='Classe' class='p-1'>",
            4 => "<img src='/images/icons/4.webp' alt='Classe' class='p-1'>",
            5 => "<img src='/images/icons/5.webp' alt='Classe' class='p-1'>",
            6 => "<img src='/images/icons/6.webp' alt='Classe' class='p-1'>",
            7 => "<img src='/images/icons/7.webp' alt='Classe' class='p-1'>",
            8 => "<img src='/images/icons/8.webp' alt='Classe' class='p-1'>",
            default => "-",
        };
    }

    public function getEmpireFlag(int $empire): string
    {
        return match ($empire) {
            1 => "<img src='/images/icons/shinso.jpg' alt='Reino'>",
            2 => "<img src='/images/icons/chunjo.jpg' alt='Reino'>",
            3 => "<img src='/images/icons/jinno.jpg' alt='Reino'>",
        };
    }

    public function minutesToHours(int $minutes = 0): string
    {
        $hours = floor($minutes / 60);
        $remainingMinutes = $minutes % 60;

        return "{$hours}h {$remainingMinutes}min";
    }


    public function invoiceStatus(string $status): string
    {
        return PaymentStatus::getStatusHTMLBadge($status);
    }
}
<?php

namespace App\Entity\Shop;

use App\Entity\Post\Link;
use App\Helper\Feedback;

class Coin
{
    private string $itemName;
    private Link $itemLink;
    private float $price;
    private int $cashReward = 0, $views = 0, $coinsAmount = 0, $dragonCoinsAmount = 0;
    private string $cashRewardName = '-';
    private array $vnumAndAmount = [];
    private string $paypalBtn = '';

    public static function createFromArray(array|bool $data): self
    {
        if (is_bool($data)) {
            throw new \InvalidArgumentException(Feedback::FAILED_TO_CREATE_PRODUCT->value);
        }

        $coins = new self();
        $coins->setItemName($data['item_name'])
            ->setItemLink(new Link($data['item_name']))
            ->setCoinsAmount($data['coins_amount'])
            ->setDragonCoinsAmount($data['dragon_coins_amount'])
            ->setPrice((float) $data['price'])
            ->setCashReward((int) $data['cash_reward'])
            ->setViews($data['views'] ?? 0)
            ->setCashRewardName($data['name'] ?? '-')
            ->setVnumAndAmount($data['vnum'], $data['amount'])
            ->setPaypalBtn($data['paypal_btn']);
        return $coins;
    }

    public function setVnumAndAmount(?string $vnum, ?string $amount): self
    {
        if (empty($vnum) || is_null($vnum)) {
            return $this;
        }

        $vnumArray = explode(',', $vnum);
        $amountArray = explode(',', $amount);

        $this->vnumAndAmount = array_combine($vnumArray, $amountArray);
        return $this;
    }

    public function getVnumAndAmount(): array
    {
        return $this->vnumAndAmount;
    }

    public static function removeNumberPunctuation(string $string): int
    {
        return (int) str_replace(
            [',', '.'],
            [''],
            $string
        );
    }

    public function getItemName(): string
    {
        return $this->itemName;
    }

    public function setItemName(?string $itemName): self
    {
        if (is_null($itemName) || empty($itemName)) { 
            throw new \InvalidArgumentException(Feedback::INVALID_ITEM_NAME->value);
        }

        $this->itemName = $itemName;
        return $this;
    }

    public function getItemLink(): Link
    {
        return $this->itemLink;
    }

    public function setItemLink(Link $itemLink): self
    {
        Link::validate($itemLink);

        $this->itemLink = $itemLink;
        return $this;
    }

    public function getCoinsAmount(): int
    {
        return $this->coinsAmount;
    }

    public function setCoinsAmount(?string $coinsAmount): self
    {
        if (is_null($coinsAmount) || empty($coinsAmount)) { 
            throw new \InvalidArgumentException(Feedback::INVALID_COINS_AMOUNT->value);
        }

        $this->coinsAmount = self::removeNumberPunctuation($coinsAmount);
        return $this;
    }

    public function getDragonCoinsAmount(): int
    {
        return $this->dragonCoinsAmount;
    }

    public function setDragonCoinsAmount(?string $dragonCoinsAmount): self
    {
        if (is_null($dragonCoinsAmount) || empty($dragonCoinsAmount)) { 
            // throw new \InvalidArgumentException(Feedback::INVALID_COINS_AMOUNT->value);
            $dragonCoinsAmount = 0;
        }

        $this->dragonCoinsAmount = self::removeNumberPunctuation($dragonCoinsAmount);
        return $this;
    }

    public function getPrice(): float
    {
        return $this->price;
    }

    public function setPrice(?float $price): self
    {
        if (is_null($price) || empty($price)) { 
            throw new \InvalidArgumentException(Feedback::INVALID_PRICE->value);
        }

        $this->price = $price;
        return $this;
    }

    public function getCashReward(): int
    {
        return $this->cashReward;
    }

    public function setCashReward(?int $cashReward)
    {
        if (is_null($cashReward) || empty($cashReward)) { 
            $cashReward = 0;
        }
        $this->cashReward = $cashReward;
        return $this;
    }

	public function getViews(): int {
		return $this->views;
	}

	public function setViews(int $views): self {
		$this->views = $views;
		return $this;
	}

	public function getCashRewardName(): string 
    {
		return $this->cashRewardName;
	}

	public function setCashRewardName(string $cashRewardName): self 
    {
		$this->cashRewardName = $cashRewardName;
		return $this;
	}

    public function getPaypalBtn(): string
    {
        return $this->paypalBtn;
    }

    public function setPaypalBtn(string $paypalBtn): self
    {
        $this->paypalBtn = $paypalBtn;
        return $this;
    }
}
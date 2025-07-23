<?php

namespace App\Entity\Account;

class Account implements \Stringable
{
    private \DateTimeInterface $goldExpire;
    private \DateTimeInterface $silverExpire;
    private \DateTimeInterface $safeboxExpire;
    private \DateTimeInterface $autolootExpire;
    private \DateTimeInterface $fishExpire;
    private \DateTimeInterface $marriageExpire;
    private \DateTimeInterface $moneyExpire;

    public function __construct(
        protected Login $login, 
        protected Email $email, 
        protected Password $password, 
        protected CharCode $charCode,
        protected ?int $id = 0,
        protected ?string $ip = '',
        protected int $coins = 0,
        protected int $dragonCoins = 0,
        protected bool $isAdmin = false,
        protected string|int|null $warehousePassword = 000000,
        protected string $referralCode = ''
    ) {}
    
    public function __toString(): string
    {
        return (string) $this->login;
    }

    public static function createFromDatabase(array $data): self
    {
        $account = new self(
            new Login($data['login']),
            new Email($data['email']),
            new Password($data['password'], true),
            new CharCode($data['social_id']),
            $data['id'],
            $data['ip'],
            $data[COINS],
            $data[DRAGON_COINS],
            $data['is_admin'],
            $data['safebox'],
            $data['referral_code']
        );

        $account->setGoldExpire(new \DateTime($data['gold_expire']))
                ->setSilverExpire(new \DateTime($data['silver_expire']))
                ->setSafeboxExpire(new \DateTime($data['safebox_expire']))
                ->setAutolootExpire(new \DateTime($data['autoloot_expire']))
                ->setFishExpire(new \DateTime($data['fish_mind_expire']))
                ->setMarriageExpire(new \DateTime($data['marriage_fast_expire']))
                ->setMoneyExpire(new \DateTime($data['money_drop_rate_expire']));

        return $account;
    }

    public static function createFromRequest(?string $login, ?string $email, ?string $password, ?string $ip, ?string $charCode): self
    {
        return new self(
            new Login($login),
            new Email($email),
            new Password($password),
            //Mt2OldSchool - charCode pode ser escolhido pelo usuário.
            new CharCode($charCode),
            0,
            $ip
        );
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function setId(int $id): self
    {
        $this->id = $id;
        return $this;
    }

    public function getLogin(): Login
    {
        return $this->login;
    }

    public function setLogin(Login $login): self
    {
        $this->login = $login;
        return $this;
    }

    public function getEmail(): Email
    {
        return $this->email;
    }

    public function setEmail(Email $email): self
    {
        $this->email = $email;
        return $this;
    }

    public function getPassword(): Password
    {
        return $this->password;
    }

    public function setPassword(Password $password): self
    {
        $this->password = $password;
        return $this;
    }

    public function getCharCode(): ?CharCode
    {
        return $this->charCode;
    }

    public function setCharCode(CharCode $charCode): self
    {
        $this->charCode = $charCode;
        return $this;
    }

    public function getIp(): ?string
    {
        return $this->ip ?? '';
    }

    public function setIp(?string $ip): self
    {
        $this->ip = $ip;
        return $this;
    }

	public function getDragonCoins(): int {
		return $this->dragonCoins;
	}
	
	public function setDragonCoins(int $dragonCoins): self {
		$this->dragonCoins = $dragonCoins;
		return $this;
	}

	public function getCoins(): int {
		return $this->coins;
	}
	
	public function setCoins(int $coins): self {
		$this->coins = $coins;
		return $this;
	}

	public function getIsAdmin(): bool {
		return $this->isAdmin;
	}
	
	public function setIsAdmin(int $isAdmin): self {
		$this->isAdmin = $isAdmin;
		return $this;
	}

	public function getWarehousePassword(): ?int 
    {
		return $this->warehousePassword;
	}
	
	public function setWarehousePassword(?int $warehousePassword): self 
    {
		$this->warehousePassword = $warehousePassword;
		return $this;
	}

    public function getReferralCode(): string
    {
        return $this->referralCode;
    }

    public function setReferralCode(string $referralCode): self
    {
        $this->referralCode = $referralCode;
        return $this;
    }

    public function getGoldExpire(): string
    {
        return $this->goldExpire->format('Y-m-d H:i:s');
    }

    public function setGoldExpire(\DateTimeInterface $goldExpire): self
    {
        $this->goldExpire = $goldExpire;
        return $this;
    }

    public function getSilverExpire(): string
    {
        return $this->silverExpire->format('Y-m-d H:i:s');
    }

    public function setSilverExpire(\DateTimeInterface $silverExpire): self
    {
        $this->silverExpire = $silverExpire;
        return $this;
    }

    public function getSafeboxExpire(): string
    {
        return $this->safeboxExpire->format('Y-m-d H:i:s');
    }

    public function setSafeboxExpire(\DateTimeInterface $safeboxExpire): self
    {
        $this->safeboxExpire = $safeboxExpire;
        return $this;
    }

    public function getAutolootExpire(): string
    {
        return $this->autolootExpire->format('Y-m-d H:i:s');
    }

    public function setAutolootExpire(\DateTimeInterface $autolootExpire): self
    {
        $this->autolootExpire = $autolootExpire;
        return $this;
    }

    public function getFishExpire(): string
    {
        return $this->fishExpire->format('Y-m-d H:i:s');
    }

    public function setFishExpire(\DateTimeInterface $fishExpire): self
    {
        $this->fishExpire = $fishExpire;
        return $this;
    }

    public function getMarriageExpire(): string
    {
        return $this->marriageExpire->format('Y-m-d H:i:s');
    }

    public function setMarriageExpire(\DateTimeInterface $marriageExpire): self
    {
        $this->marriageExpire = $marriageExpire;
        return $this;
    }

    public function getMoneyExpire(): string
    {
        return $this->moneyExpire->format('Y-m-d H:i:s');
    }

    public function setMoneyExpire(\DateTimeInterface $moneyExpire): self
    {
        $this->moneyExpire = $moneyExpire;
        return $this;
    }
}
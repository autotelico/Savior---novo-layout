<?php

namespace App\Repository;

use App\Entity\Account\Email;
use App\Infra\Database\DatabaseConnection;
use App\Entity\Account\Account;
use App\Entity\Account\Login;

class AccountRepository
{
    public function __construct(private DatabaseConnection $conn) {}

    public function create(Account $account): void
    {
        $this->conn->count("INSERT INTO " . DB_ACCOUNT . ".account (login, password, email, social_id, create_time, ".IP.", ".COINS.", ".DRAGON_COINS.", is_admin, referral_code) VALUES (:LOGIN, :PASSWORD, :EMAIL, :SOCIAL_ID, NOW(), :IP, :COINS, :D_COINS, :IS_ADMIN, :REFERRAL)", [
            ':LOGIN'     => $account->getLogin(),
            ':PASSWORD'  => $account->getPassword(),
            ':EMAIL'     => $account->getEmail(),
            ':SOCIAL_ID' => $account->getCharCode(),
            ':IP'        => $account->getIp(),
            ':COINS'     => $account->getCoins(),
            ':D_COINS'   => $account->getDragonCoins(),
            ':IS_ADMIN'  => (int) $account->getIsAdmin(),
            ':REFERRAL'  => $account->getReferralCode()
        ]);
    }

    public function update(Account $account): void
    {
        $this->conn->count("UPDATE ". DB_ACCOUNT . ".account SET login = :LOGIN, password = :PASSWORD, email = :EMAIL, social_id = :SOCIAL_ID, ".IP." = :IP, ".COINS." = :COINS, ".DRAGON_COINS." = :D_COINS, is_admin = :IS_ADMIN, referral_code = :REFERRAL, gold_expire = :GOLD_EXPIRE, silver_expire = :SILVER_EXPIRE, safebox_expire = :SAFEBOX_EXPIRE, autoloot_expire = :AUTOLOOT_EXPIRE, fish_mind_expire = :FISH_EXPIRE, marriage_fast_expire = :MARRIAGE_EXPIRE, money_drop_rate_expire = :MONEY_EXPIRE WHERE id = :ID", [
            ':LOGIN'           => $account->getLogin(),
            ':PASSWORD'        => $account->getPassword(),
            ':EMAIL'           => $account->getEmail(),
            ':SOCIAL_ID'       => $account->getCharCode(),
            ':IP'              => $account->getIp(),
            ':COINS'           => $account->getCoins(),
            ':D_COINS'         => $account->getDragonCoins(),
            ':IS_ADMIN'        => (int) $account->getIsAdmin(),
            ':ID'              => $account->getId(),
            ':REFERRAL'        => $account->getReferralCode(),
            ':GOLD_EXPIRE'     => $account->getGoldExpire(),
            ':SILVER_EXPIRE'   => $account->getSilverExpire(),
            ':SAFEBOX_EXPIRE'  => $account->getSafeboxExpire(),
            ':AUTOLOOT_EXPIRE' => $account->getAutolootExpire(),
            ':FISH_EXPIRE'     => $account->getFishExpire(),
            ':MARRIAGE_EXPIRE' => $account->getMarriageExpire(),
            ':MONEY_EXPIRE'    => $account->getMoneyExpire(),
        ]);
    }

    public function getByLogin(Login $login): mixed
    {
        return $this->conn->select("SELECT a.*, COALESCE(s.password, NULL) as safebox
        FROM " . DB_ACCOUNT . ".account a 
        LEFT JOIN " . DB_PLAYER . ".safebox s ON s.account_id = a.id
        WHERE login = :LOGIN", [
            ":LOGIN" => $login
        ]);
    }

    public function getByEmail(Email $email): mixed
    {
        return $this->conn->select("SELECT a.*, COALESCE(s.password, NULL) as safebox
        FROM " . DB_ACCOUNT . ".account a 
        LEFT JOIN " . DB_PLAYER . ".safebox s ON s.account_id = a.id
        WHERE email = :EMAIL", [
            ":EMAIL" => $email
        ]);
    }

    public function listAccountsCashAmount(int $limit = 100): mixed
    {
        return $this->conn->selectAll("SELECT ".COINS.", ".DRAGON_COINS.", login FROM " . DB_ACCOUNT . ".account ORDER BY ".COINS." DESC, ".DRAGON_COINS." DESC LIMIT :LIMIT", [
            ':LIMIT' => $limit
        ]);
    }

    public function totalAccounts(): int
    {
        return $this->conn->count("SELECT login FROM " . DB_ACCOUNT . ".account");
    }

    public function getByPlayerName(string $name): mixed
    {
        return $this->conn->select("SELECT a.login 
        FROM " . DB_PLAYER . ".player p 
        LEFT JOIN " . DB_ACCOUNT . ".account a ON p.account_id = a.id
        WHERE name = :PNAME;", [
            ':PNAME' => $name
        ]);
    }
    
}
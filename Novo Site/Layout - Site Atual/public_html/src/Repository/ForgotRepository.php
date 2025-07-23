<?php

namespace App\Repository;

use App\Entity\Account\Login;
use App\Entity\Forgot\Forgot;
use App\Entity\Post\Link;
use App\Infra\Database\DatabaseConnection;

class ForgotRepository
{
    public function __construct(
        private DatabaseConnection $conn
    ){}

    public function save(Forgot $forgot): void
    {
        $this->conn->count("INSERT INTO " . DB_ARK . ".forgot (hint, code, date, available, who) VALUES (:HINT, :CODE, :DATE, :AVAILABLE, :WHO);", [
            ":HINT"      => $forgot->getHint(),
            ":CODE"      => $forgot->getCode(),
            ":DATE"      => $forgot->getDate(),
            ":AVAILABLE" => $forgot->getAvailable(),
            ":WHO"       => $forgot->getWho()
        ]);
    }

    public function update(Forgot $forgot): void
    {
        $this->conn->count("UPDATE " . DB_ARK . ".forgot SET hint = :HINT, code = :CODE, date = :DATE, available = :AVAILABLE, who = :WHO WHERE id = :ID", [
            ":HINT"      => $forgot->getHint(),
            ":CODE"      => $forgot->getCode(),
            ":DATE"      => $forgot->getDate(),
            ":AVAILABLE" => $forgot->getAvailable(),
            ":WHO"       => $forgot->getWho(),
            ":ID"        => $forgot->getId(),
        ]);
    }

    public function countEmailsSentByLogin(Login $login): mixed
    {
        return $this->conn->count("SELECT * FROM " . DB_ARK . ".forgot WHERE who = :WHO AND date > NOW();", [
            ":WHO" => $login
        ]);
    }

    public function getForgotDataByCode(Link $code): mixed
    {
        return $this->conn->select("SELECT * FROM " . DB_ARK . ".forgot WHERE code = :CODE AND date > NOW();", [
            ':CODE' => $code->__toString()
        ]);
    }

    public function countEmailsSentToday(): mixed
    {
        return $this->conn->count("SELECT * FROM " . DB_ARK . ".forgot WHERE DATE(date) = CURDATE();");
    }
}
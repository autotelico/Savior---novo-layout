<?php

namespace App\Repository;

use App\Infra\Database\DatabaseConnection;

class ShopCoinsRewardRepository
{
    public function __construct(
        private DatabaseConnection $conn
    ){}

    public function create(string $name, string $vnum, string $amount): void
    {
        $this->conn->count("INSERT INTO " . DB_ARK . ".cash_reward (name, vnum, amount) VALUES (:NAME, :VNUM, :AMOUNT)", [
            ':NAME'   => $name,
            ':VNUM'   => $vnum,
            ':AMOUNT' => $amount
        ]);
    }

    public function list(): mixed
    {
        return $this->conn->selectAll("SELECT * FROM " . DB_ARK . ".cash_reward");
    }

    public function delete(int $id): void
    {
        $this->conn->count("DELETE FROM " . DB_ARK . ".cash_reward WHERE id = :ID", [
            ':ID' => $id
        ]);
    }
}
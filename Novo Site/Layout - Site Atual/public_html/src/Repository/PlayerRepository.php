<?php

namespace App\Repository;

use App\Infra\Database\DatabaseConnection;

class PlayerRepository
{
    private string $time;

    public function __construct(private DatabaseConnection $conn)
    {
        $this->time = (new \DateTime('-7 Days'))->format('Y-m-d H:i:s'); 
    }

    public function getOnlinePlayersInterval(int $interval = 5): int
    {
        return $this->conn->select("SELECT COUNT(*) as total 
        FROM " . DB_PLAYER . ".player 
        WHERE DATE_SUB(NOW(), INTERVAL :INTERVAL MINUTE) < last_play", [
            ':INTERVAL' => $interval
        ])['total'];
    }

    public function getRankLevel(int $offset = 0, int $recordsPerPage = 100): mixed
    {
        return $this->conn->selectAll("SELECT p.name, p.level, pI.empire, p.id, p.job, p.exp, p.playtime
        FROM " . DB_PLAYER . ".player p
        LEFT JOIN " . DB_PLAYER . ".player_index pI ON p.account_id = pI.id
        WHERE p.name NOT LIKE '%[%]%'
        ORDER BY p.level DESC, p.exp DESC, p.playtime DESC 
        LIMIT :OFFSET, :LIMIT;", [
            ":OFFSET" => $offset,
            ":LIMIT" => $recordsPerPage
        ]);
    }

    public function countRankLevel(): mixed
    {
        return $this->conn->count("SELECT id FROM " . DB_PLAYER . ".player");
    }

    public function getRankGuild(int $offset = 0, int $recordsPerPage = 100): mixed
    {
        return $this->conn->selectAll("SELECT g.name, g.win, g.draw, g.loss, pI.empire
        FROM " . DB_PLAYER . ".guild g
        LEFT JOIN " . DB_PLAYER . ".player_index pI ON g.master = pI.pid1 OR g.master = pI.pid2 OR g.master = pI.pid3 OR g.master = pI.pid4
        ORDER BY g.win DESC  
        LIMIT :OFFSET, :LIMIT;", [
            ":OFFSET" => $offset,
            ":LIMIT" => $recordsPerPage
        ]);
    }

    public function countRankGuild(): mixed
    {
        return $this->conn->count("SELECT id FROM " . DB_PLAYER . ".guild");
    }

    public function listAmountOfItens(int $limit = 100): mixed
    {
        return $this->conn->selectAll("SELECT SUM(count) AS total, pI.vnum, pIP.locale_name 
        FROM " . DB_PLAYER . ".item pI
        JOIN " . DB_PLAYER . ".item_proto pIP ON pI.vnum = pIP.vnum
        GROUP BY vnum, pIP.locale_name
        ORDER BY total DESC
        LIMIT :LIMIT", [
            ':LIMIT' => $limit
        ]);
    }

    public function countItemByVnum(int $vnum): mixed
    {
        return $this->conn->selectAll("SELECT SUM(count) AS total FROM " . DB_PLAYER . ".item WHERE vnum = :VNUM", [
            ':VNUM' => $vnum
        ]);
    }

    public function listPlayersByAccountID(int $id): mixed
    {
        return $this->conn->selectAll("SELECT p.*, pI.empire FROM " . DB_PLAYER . ".player p
        LEFT JOIN " . DB_PLAYER . ".player_index pI ON p.account_id = pI.id 
        WHERE account_id = :ID;", [
            ":ID" => $id
        ]);
    }

    public function moveToTown(string $character, array $coords): void
    {
        $this->conn->count("UPDATE " . DB_PLAYER . ".player SET x = :X, y = :Y, map_index = :MAP_INDEX WHERE name = :NAME", [
            ':X'         => $coords['x'],
            ':Y'         => $coords['y'],
            ':MAP_INDEX' => $coords['map_index'],
            ':NAME'      => $character
        ]);
    }

    public function getTopWarrior(): array
    {
        $result = $this->conn->select("SELECT name, job, level FROM ". DB_PLAYER .".player WHERE job IN (0, 4) AND player.name NOT LIKE '[%]%' ORDER BY level DESC, playtime DESC LIMIT 1");

        return $result == false ? [] : $result;
    }

    public function getTopAssassin(): array
    {
        $result = $this->conn->select("SELECT name, job, level FROM ". DB_PLAYER .".player WHERE job IN (1, 5) AND player.name NOT LIKE '[%]%' ORDER BY level DESC, playtime DESC LIMIT 1");

        return $result == false ? [] : $result;
    }

    public function getTopSura(): array
    {
        $result = $this->conn->select("SELECT name, job, level FROM ". DB_PLAYER .".player WHERE job IN (2, 6) AND player.name NOT LIKE '[%]%' ORDER BY level DESC, playtime DESC LIMIT 1");

        return $result == false ? [] : $result;
    }

    public function getTopShaman(): array
    {
        $result = $this->conn->select("SELECT name, job, level FROM ". DB_PLAYER .".player WHERE job IN (3, 7) AND player.name NOT LIKE '[%]%' ORDER BY level DESC, playtime DESC LIMIT 1");

        return $result == false ? [] : $result;
    }

    public function getTopLycan(): array
    {
        $result = $this->conn->select("SELECT name, job, level FROM ". DB_PLAYER .".player WHERE job = 8 AND player.name NOT LIKE '[%]%' ORDER BY level DESC, playtime DESC LIMIT 1");

        return $result == false ? [] : $result;
    }

}
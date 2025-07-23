<?php

namespace App\Infra\Database;

class DatabaseConnection
{
    private $conn;
    private array $settings = [
        \PDO::ATTR_EMULATE_PREPARES => false, 
        \PDO::ATTR_DEFAULT_FETCH_MODE => \PDO::FETCH_ASSOC,
        \PDO::ATTR_ERRMODE => \PDO::ERRMODE_EXCEPTION
    ];

    public function __construct()
    {
        try {
            $this->conn = new \PDO('mysql:host='.DB_HOST.';port='.DB_PORT.';dbname='.DB_ACCOUNT.';charset='.CHARSET.'', DB_USER, DB_PASS, $this->settings);
        } catch (\PDOException $e) {
            error_log("Failed to connect: {$e->getMessage()}");
            exit('Failed to connect to database.');
        }
    }

    public function lastInsertId(): int 
    {
        return $this->conn->lastInsertId();
    }

    public function selectAll(string $rawQuery, array $params = []): array
    {
        $stmt = $this->conn->prepare($rawQuery);
        $stmt->execute($params);
        return $stmt->fetchAll();
    }

    public function select(string $rawQuery, array $params = []): mixed
    {
        $stmt = $this->conn->prepare($rawQuery);
        $stmt->execute($params);
        return $stmt->fetch();
    }

    public function count(string $rawQuery, array $params = []): int
    {
        $stmt = $this->conn->prepare($rawQuery);
        $stmt->execute($params);
        return $stmt->rowCount();
    }
}
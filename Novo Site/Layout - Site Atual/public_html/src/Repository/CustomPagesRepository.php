<?php

namespace App\Repository;

use App\Infra\Database\DatabaseConnection;

class CustomPagesRepository
{
    public function __construct(
        private DatabaseConnection $conn
    ){}

    public function update(string $content, string $type): void
    {
        $this->conn->count("UPDATE " . DB_ARK . ".tos SET content = :CONTENT WHERE type = :TYPE", [
            ':TYPE' => $type,
            ':CONTENT' => $content
        ]);
    }

    public function getAll(): mixed
    {
        return $this->conn->selectAll("SELECT * FROM " . DB_ARK . ".tos");
    }
}
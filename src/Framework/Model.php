<?php

declare(strict_types=1);

namespace Framework;

use App\Database;
use PDO;

abstract class Model
{
    protected $table;

    public function __construct(private Database $db)
    {
    }
    public function findAll(): array
    {
        $pdo = $this->db->getConnection();

        $sql = "SELECT * FROM $this->table";
        # SQL　文を実行
        $stmt = $pdo->prepare($sql);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function find(string $id): array|bool
    {
        $conn = $this->db->getConnection();

        $sql = "SELECT * FROM $this->table WHERE id = :id";

        $stmt = $conn->prepare($sql);
        $stmt->bindValue(':id', $id, PDO::PARAM_INT);

        $stmt->execute();
        return  $stmt->fetch(PDO::FETCH_ASSOC);
    }
}


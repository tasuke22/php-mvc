<?php

declare(strict_types=1);

namespace Framework;

use App\Database;
use PDO;

abstract class Model
{
    public function __construct(private Database $db)
    {
    }
    public function findAll(): array
    {
        $pdo = $this->db->getConnection();

        # SQL　文を実行
        $stmt = $pdo->prepare('SELECT * FROM todos');
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function find(string $id): array|bool
    {
        $conn = $this->db->getConnection();

        $sql = "SELECT * FROM todos WHERE id = :id";

        $stmt = $conn->prepare($sql);
        $stmt->bindValue(':id', $id, PDO::PARAM_INT);

        $stmt->execute();
        return  $stmt->fetch(PDO::FETCH_ASSOC);
    }
}


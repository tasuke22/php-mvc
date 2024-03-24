<?php

declare(strict_types=1);

namespace Framework;

use App\Database;
use PDO;

abstract class Model
{
    protected $table;

    private function getTable(): string
    {
        if ($this->table !== null) {
            return $this->table;
        }
        // 一旦、Modelのクラス名 + s でテーブル名を作成
        $parts = explode('\\', $this::class . "s");
        return strtolower(array_pop($parts));
    }

    public function __construct(private Database $db)
    {
    }

    public function findAll(): array
    {
        $pdo = $this->db->getConnection();

        $sql = "SELECT * FROM {$this->getTable()}";
        # SQL　文を実行
        $stmt = $pdo->prepare($sql);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function find(string $id): array|bool
    {
        $conn = $this->db->getConnection();

        $sql = "SELECT * FROM {$this->getTable()} WHERE id = :id";

        $stmt = $conn->prepare($sql);
        $stmt->bindValue(':id', $id, PDO::PARAM_INT);

        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function insert(array $data): bool
    {
        // 仮のデータ
        $user_id = "860c602c-2b99-48b3-82b7-253f52ad9c7e";
        $completed = 0;

        $columns = implode(", ", array_keys($data));
        $placeholders =  implode(", ", array_fill(0, count($data), "?"));

        $sql = "INSERT INTO {$this->getTable()} ($columns) VALUES ($placeholders)";

        exit($sql);
        $conn = $this->db->getConnection();

        $stmt = $conn->prepare($sql);

        $stmt->bindValue(1, $data['title'], PDO::PARAM_STR);
        $stmt->bindValue(2, $data['description'], PDO::PARAM_STR);
        $stmt->bindValue(3, $completed, PDO::PARAM_INT);
        $stmt->bindValue(4, $user_id, PDO::PARAM_STR);

        return $stmt->execute();
    }
}


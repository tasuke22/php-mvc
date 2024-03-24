<?php

declare(strict_types=1);

namespace Framework;

use App\Database;
use PDO;

abstract class Model
{
    protected $table;

    protected array $errors = [];

    public function update(string $id, array $data): bool
    {
        $this->validate($data);
        if (!empty($this->errors)) {
            return false;
        }

        return true;
    }


    protected function validate(array $data): void
    {
    }

    public function getInsertId(): string
    {
        $conn = $this->db->getConnection();
        return $conn->lastInsertId();
    }

    protected function addError(string $field, string $message): void
    {
        $this->errors[$field] = $message;
    }

    public function getErrors(): array
    {
        return $this->errors;
    }

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

        $sql = "SELECT *
                FROM {$this->getTable()}
                WHERE id = :id";

        $stmt = $conn->prepare($sql);

        $stmt->bindValue(":id", $id, PDO::PARAM_INT);

        $stmt->execute();

        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function insert(array $data): bool
    {
        $this->validate($data);
        if (!empty($this->errors)) {
            return false;
        }

        $columns = implode(", ", array_keys($data));
        $placeholders = implode(", ", array_fill(0, count($data), "?"));

        $sql = "INSERT INTO {$this->getTable()} ($columns) VALUES ($placeholders)";

        $conn = $this->db->getConnection();

        $stmt = $conn->prepare($sql);

        $i = 1;
        foreach ($data as $value) {
            $type = match (gettype($value)) {
                'boolean' => PDO::PARAM_BOOL,
                'integer' => PDO::PARAM_INT,
                'NULL' => PDO::PARAM_NULL,
                default => PDO::PARAM_STR,
            };

            $stmt->bindValue($i++, $value, $type);
        }

        return $stmt->execute();
    }
}


<?php

namespace App\Models;

use App\Database;
use PDO;

class Todo
{
    public function __construct(private Database $db)
    {
    }
    public function getData(): array
    {
        $pdo = $this->db->getConnection();

        # SQL　文を実行
        $stmt = $pdo->prepare('SELECT * FROM todos');
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}


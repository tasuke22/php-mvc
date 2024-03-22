<?php

namespace App\Models;

use App\Database;
use PDO;

class Todo
{
    public function getData(): array
    {
        $pdo = new Database;
        $db = $pdo->getConnection();

        # SQL　文を実行
        $stmt = $db->prepare('SELECT * FROM todos');
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}


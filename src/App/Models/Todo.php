<?php

declare(strict_types=1);

namespace App\Models;

use Framework\Model;
use PDO;

class Todo extends Model
{
    protected $table = 'todos';


    protected function validate(array $data): void
    {
        if (empty($data["title"])) {
            $this->addError("title", "Title is required");
        }
    }

    public function getTotal(): int
    {
        $sql = "SELECT COUNT(*) as total FROM todos";
        
        $conn = $this->db->getConnection();
        $stmt = $conn->query($sql);
        

        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        return (int) $row["total"];
    }

}


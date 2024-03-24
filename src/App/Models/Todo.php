<?php

declare(strict_types=1);

namespace App\Models;

use Framework\Model;

class Todo extends Model
{
    protected $table = 'todos';


    protected function validate(array $data): void
    {
        if (empty($data["title"])) {
            $this->addError("title", "Title is required");
        }
    }

}


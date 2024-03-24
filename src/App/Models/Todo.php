<?php

declare(strict_types=1);

namespace App\Models;

use Framework\Model;

class Todo extends Model
{
    protected $table = 'todos';

    protected array $errors = [];

    protected function addError(string $field, string $message): void
    {
        $this->errors[$field] = $message;
    }

    protected function validate(array $data): bool
    {
        if (empty($data["title"])) {
            $this->addError("title", "Title is required");
        }
        return empty($this->errors);
    }

    public function getErrors(): array
    {
        return $this->errors;
    }
}


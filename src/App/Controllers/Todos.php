<?php

namespace App\Controllers;

use App\Models\Todo;

class Todos
{
    public function index(): void
    {
        $model = new Todo;
        $todos = $model->getData();

        require 'views/todos_index.php';
    }

    public function show(string $id): void
    {
        var_dump($id);
        require "views/todos_show.php";
    }
}


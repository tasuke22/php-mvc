<?php

namespace App\Controllers;

class Todos
{
    public function index(): void
    {
        $model = new \App\Models\Todo;
        $todos = $model->getData();

        require 'views/todos_index.php';
    }

    public function show(): void
    {
        require "views/todos_show.php";
    }
}


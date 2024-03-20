<?php

class Todos
{
    public function index(): void
    {
        require "models/todo.php";

        $model = new Todo();
        $todos = $model->getData();

        require 'views/todos_index.php';
    }

    public function show(): void
    {
        require "views/todos_show.php";
    }
}


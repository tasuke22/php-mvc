<?php

namespace App\Controllers;

use App\Models\Todo;
use Framework\Viewer;

class Todos
{
    public function index(): void
    {
        $model = new Todo;
        $todos = $model->getData();

        $viewer = new Viewer();
        $viewer->render('todos_index.php', $todos);
    }

    public function show(string $id): void
    {
        var_dump($id);
        require "views/todos_show.php";
    }

    public function showPage(string $title, string $id, string $page)
    {
        echo $title . " " . $id . " " . $page;
    }
}


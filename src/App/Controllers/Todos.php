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
        echo $viewer->render("shared/header.php", [
            'title' => 'Todos'
        ]);
        echo $viewer->render('Todos/index.php', [
            'todos' => $todos
        ]);
    }

    public function show(string $id): void
    {
        $viewer = new Viewer();

        echo $viewer->render("shared/header.php", [
            'title' => 'Todos'
        ]);
        echo $viewer->render('Todos/show.php', [
            'id' => $id
        ]);
    }

    public function showPage(string $title, string $id, string $page)
    {
        echo $title . " " . $id . " " . $page;
    }
}


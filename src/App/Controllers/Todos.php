<?php

namespace App\Controllers;

use App\Models\Todo;
use Framework\Viewer;

class Todos
{
    public function __construct(private Viewer $viewer)
    {
    }

    public function index(): void
    {
        $model = new Todo;
        $todos = $model->getData();

        echo $this->viewer->render("shared/header.php", [
            'title' => 'Todos'
        ]);
        echo $this->viewer->render('Todos/index.php', [
            'todos' => $todos
        ]);
    }

    public function show(string $id): void
    {
        echo $this->viewer->render("shared/header.php", [
            'title' => 'Todos'
        ]);
        echo $this->viewer->render('Todos/show.php', [
            'id' => $id
        ]);
    }

    public function showPage(string $title, string $id, string $page)
    {
        echo $title . " " . $id . " " . $page;
    }
}


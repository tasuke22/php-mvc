<?php

namespace App\Controllers;

use App\Models\Todo;
use Framework\Exceptions\PageNotFoundException;
use Framework\Viewer;

class Todos
{
    public function __construct(private Viewer $viewer, private Todo $model)
    {
    }

    public function index(): void
    {
        $todos = $this->model->findAll();

        echo $this->viewer->render("shared/header.php", [
            'title' => 'Todos'
        ]);
        echo $this->viewer->render('Todos/index.php', [
            'todos' => $todos
        ]);
    }

    public function show(string $id): void
    {
        $todo = $this->model->find($id);

        if (!$todo) {
            throw new PageNotFoundException();
        }

        echo $this->viewer->render("shared/header.php", [
            'title' => 'Todos'
        ]);
        echo $this->viewer->render('Todos/show.php', [
            'todo' => $todo
        ]);
    }

    public function showPage(string $title, string $id, string $page)
    {
        echo $title . " " . $id . " " . $page;
    }

    public function new()
    {
        $this->viewer->render("shared/header.php", [
            'title' => 'New Todo'
        ]);

        echo $this->viewer->render('Todos/new.php');
    }
}


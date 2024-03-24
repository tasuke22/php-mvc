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

    public function edit(string $id): void
    {
        $todo = $this->model->find($id);

        if (!$todo) {
            throw new PageNotFoundException();
        }

        echo $this->viewer->render("shared/header.php", [
            'title' => 'Edit Todos'
        ]);
        echo $this->viewer->render('Todos/edit.php', [
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

    public function create()
    {
        $data = [
            'title' => $_POST['title'],
            'description' => empty($_POST['description']) ? null : $_POST['description'],
            'completed' => $_POST['completed'],
            'user_id' => $_POST['user_id'],
        ];

        if ($this->model->insert($data)) {
            header("Location: /todos/{$this->model->getInsertId()}/show");
            exit;
        } else {
            echo $this->viewer->render("shared/header.php", [
                'title' => 'New Todo'
            ]);

            echo $this->viewer->render('Todos/new.php', [
                'errors' => $this->model->getErrors(),
                'todo' => $data
            ]);
        }
    }

    public function update(string $id)
    {
        $todo = $this->model->find($id);

        if (!$todo) {
            throw new PageNotFoundException();
        }

        $todo['title'] = $_POST['title'];
        $todo['description'] = $_POST['description'];
        $todo['completed'] = $_POST['completed'];
        $todo['user_id'] = $_POST['user_id'];

        if ($this->model->update($id, $todo)) {
            header("Location: /todos/$id/show");
            exit;
        } else {
            echo $this->viewer->render("shared/header.php", [
                'title' => 'Edit Todo'
            ]);

            echo $this->viewer->render('Todos/edit.php', [
                'errors' => $this->model->getErrors(),
                "todo" => $todo
            ]);
        }
    }
}


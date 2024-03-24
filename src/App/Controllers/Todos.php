<?php

namespace App\Controllers;

use App\Models\Todo;
use Framework\Controller;
use Framework\Exceptions\PageNotFoundException;
use Framework\Viewer;

class Todos extends Controller
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
            'todos' => $todos,
            "total" => $this->model->getTotal()
        ]);
    }

    public function show(string $id): void
    {
        $todo = $this->getTodo($id);

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
        $todo = $this->getTodo($id);

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

    private function getTodo(string $id): array
    {
        $todo = $this->model->find($id);

        if (!$todo) {
            throw new PageNotFoundException();
        }
        return $todo;
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
            'title' => $this->request->post['title'],
            'description' => empty($this->request->post['description']) ? null : $this->request->post['description'],
            'completed' => $this->request->post['completed'],
            'user_id' => $this->request->post['user_id'],
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
        $todo = $this->getTodo($id);

        if (!$todo) {
            throw new PageNotFoundException();
        }

        $todo['title'] = $this->request->post['title'];
        $todo['description'] = $this->request->post['description'];
        $todo['completed'] = $this->request->post['completed'];
        $todo['user_id'] = $this->request->post['user_id'];

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

    public function delete(string $id): void
    {
        $todo = $this->getTodo($id);

        echo $this->viewer->render("shared/header.php", [
            'title' => 'Delete Todo'
        ]);

        echo $this->viewer->render('Todos/delete.php', [
            'todo' => $todo
        ]);
    }

    public function destroy(string $id)
    {
        $todo = $this->getTodo($id);

        $this->model->delete($id);
        header("Location: /todos/index");
        exit;
    }
}


<?php

namespace App\Controllers;

use App\Models\Todo;
use Framework\Controller;
use Framework\Exceptions\PageNotFoundException;
use Framework\Response;

class Todos extends Controller
{

    public function __construct(private Todo $model)
    {
    }

    public function index(): Response
    {
        $todos = $this->model->findAll();

        return $this->view('Todos/index.mvc.php', [
                'todos' => $todos,
                "total" => $this->model->getTotal()
            ]);
    }

    public function show(string $id): Response
    {
        $todo = $this->getTodo($id);

        if (!$todo) {
            throw new PageNotFoundException();
        }

        return $this->view('Todos/show.mvc.php', [
            'todo' => $todo
        ]);
    }

    public function edit(string $id): Response
    {
        $todo = $this->getTodo($id);

        if (!$todo) {
            throw new PageNotFoundException();
        }

        return $this->view('Todos/edit.mvc.php', [
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

    public function new(): Response
    {
        return $this->view('Todos/new.mvc.php');
    }

    public function create(): Response
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
            return $this->view('Todos/new.mvc.php', [
                'errors' => $this->model->getErrors(),
                'todo' => $data
            ]);
        }
    }

    public function update(string $id): Response
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
            return $this->view('Todos/edit.mvc.php', [
                'errors' => $this->model->getErrors(),
                "todo" => $todo
            ]);
        }
    }

    public function delete(string $id): Response
    {
        $todo = $this->getTodo($id);

        return $this->view('Todos/delete.mvc.php', [
            'todo' => $todo
        ]);
    }

    public function destroy(string $id): Response
    {
        $todo = $this->getTodo($id);

        $this->model->delete($id);
        header("Location: /todos/index");
        exit;
    }
}


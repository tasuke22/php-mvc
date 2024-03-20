<?php

class Controller
{
    public function index()
    {
        require 'model.php';

        $model = new Model();
        $todos = $model->getData();

        require 'view.php';
    }
}

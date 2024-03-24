<?php

namespace App\Controllers;
use Framework\Controller;

class Home extends Controller
{
    public function index(): void
    {
        echo $this->viewer->render("shared/header.php", [
            'title' => 'Home page'
        ]);
        echo $this->viewer->render('Home/index.php');
    }
}
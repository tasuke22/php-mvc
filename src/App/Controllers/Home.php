<?php

namespace App\Controllers;
use Framework\Controller;
use Framework\Viewer;

class Home extends Controller
{
    public function index(): void
    {
        $viewer = new Viewer();
        echo $viewer->render("shared/header.php", [
            'title' => 'Home page'
        ]);
        echo $viewer->render('Home/index.php');
    }
}
<?php

namespace App\Controllers;
use Framework\Viewer;

class Home
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
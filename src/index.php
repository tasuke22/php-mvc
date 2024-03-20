<?php


$action = $_GET["action"];
$controller = $_GET["controller"];

if ($controller === "todos") {
    require 'controllers/todos.php';
    $controller_object = new Todos();
} elseif ($controller === "home") {
    require 'controllers/home.php';
    $controller_object = new Home();
}
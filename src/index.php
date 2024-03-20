<?php

require 'controllers/todos.php';

$controller = new Todos();

$action = $_GET["action"];

if ($action === "index") {
    $controller->index();
} elseif ($action === "show") {
    $controller->show();
}
$controller->show();
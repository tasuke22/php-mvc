<?php

$path = parse_url($_SERVER["REQUEST_URI"], PHP_URL_PATH);

spl_autoload_register(function (string $class_name) {
    require str_replace("\\", "/", $class_name) . ".php";
});

$router = new Framework\Router;

$router->add("/admin/{controller}/{action}", ["namespace" => "Admin"]);
$router->add("/{title}/{id:\d+}/{page:\d+}", ["controller" => "todos", "action" => "showPage"]);
$router->add("/todo/{slug:[\w-]+}", ["controller" => "todos", "action" => "show"]);
$router->add("/{controller}/{id:\d+}/{action}");
$router->add("/home/index", ["controller" => "home", "action" => "index"]);
$router->add("/todos", ["controller" => "todos", "action" => "index"]);
$router->add("/", ["controller" => "home", "action" => "index"]);
$router->add("/{controller}/{action}");

$dispatcher = new Framework\Dispatcher($router);
$dispatcher->handle($path);

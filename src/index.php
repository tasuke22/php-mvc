<?php

$path = parse_url($_SERVER["REQUEST_URI"], PHP_URL_PATH);

spl_autoload_register(function (string $class_name) {
    var_dump($class_name. ".php");
    require str_replace("\\", "/", $class_name) . ".php";
});

$router = new Framework\Router;

$router->add("/home/index", ["controller" => "home", "action" => "index"]);
$router->add("/todos", ["controller" => "todos", "action" => "index"]);
$router->add("/", ["controller" => "home", "action" => "index"]);

$params = $router->match($path);

if (!$params) {
    exit("Route not found");
}

$action = $params["action"];
$controller = $params["controller"];

require "controllers/$controller.php";

$controller_object = new $controller;

$controller_object->$action();
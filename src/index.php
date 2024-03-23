<?php

declare(strict_types=1);

set_exception_handler(function (Throwable $exception) {
    $show_errors = true;
    if ($show_errors) {
        ini_set("display_errors", "1");
    } else {
        ini_set("display_errors", "0");
        ini_set("log_errors", "1");

        require "views/500.php";
    }

    throw $exception;
});


$path = parse_url($_SERVER["REQUEST_URI"], PHP_URL_PATH);

if ($path === false) {
    throw new UnexpectedValueException("Malformed URL: '$_SERVER[REQUEST_URI]'");
}

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

$container = new Framework\Container;


$container->set(App\Database::class, function () {
    return new App\Database("db", "mydatabase", "myuser", "mypassword");
});

$dispatcher = new Framework\Dispatcher($router, $container);
$dispatcher->handle($path);

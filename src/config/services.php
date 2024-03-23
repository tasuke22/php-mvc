<?php

$container = new Framework\Container;


$container->set(App\Database::class, function () {
    return new App\Database("db", "mydatabase", "myuser", "mypassword");
});


return $container;
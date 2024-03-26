<?php

use Framework\TemplateViewerInterface;

$container = new Framework\Container;


$container->set(App\Database::class, function () {
    return new App\Database(
        $_ENV["MYSQL_HOST"],
        $_ENV["MYSQL_DATABASE"],
        $_ENV["MYSQL_USER"],
        $_ENV["MYSQL_PASSWORD"],
    );
});

$container->set(TemplateViewerInterface::class, function () {
    return new Framework\MVCTemplateViewer;
});


return $container;
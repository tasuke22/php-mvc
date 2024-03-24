<?php

declare(strict_types=1);

namespace Framework;

class Request
{
    public function __construct(public string $path,
                                public string $method,
                                public array  $get,
                                public array  $post,
                                public array  $files,
                                public array  $cookies,
                                public array  $server)
    {
    }

    public static function createFromGlobals(): static
    {
        return new static(
            $_SERVER["REQUEST_URI"],
            $_SERVER["REQUEST_METHOD"],
            $_GET,
            $_POST,
            $_FILES,
            $_COOKIE,
            $_SERVER
        );
    }

}
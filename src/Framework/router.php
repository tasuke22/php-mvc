<?php

namespace Framework;

class Router
{
    private array $router = [];

    public function add(string $path, array $params): void
    {
        $this->router[] = [
            "path" => $path,
            "params" => $params
        ];
    }

    public function match(string $path): array|bool
    {
        foreach ($this->router as $route) {
            if ($route["path"] === $path) {
                return $route["params"];
            }
        }
        return false;
    }
}
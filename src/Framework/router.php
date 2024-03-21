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
        $patter = "#^/(?<controller>[a-z]+)/(?<action>[a-z]+)$#";

        if (preg_match($patter, $path, $matches)) {
            $matches = array_filter($matches, "is_string", ARRAY_FILTER_USE_KEY);
            return $matches;
        }

//        foreach ($this->router as $route) {
//            if ($route["path"] === $path) {
//                return $route["params"];
//            }
//        }
        return false;
    }
}
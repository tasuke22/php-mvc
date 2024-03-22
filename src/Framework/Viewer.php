<?php

namespace Framework;

class Viewer
{
    public function render(string $template, array $todos)
    {
        require "views/$template";
    }
}
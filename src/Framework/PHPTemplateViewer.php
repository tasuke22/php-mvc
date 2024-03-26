<?php

namespace Framework;

class PHPTemplateViewer implements TemplateViewerInterface
{
    public function render(string $template, array $data = []): string
    {
        echo "PHPTemplateViewer class here";
        extract($data, EXTR_SKIP);
        ob_start();

        require dirname(__DIR__) . "/views/$template";

        return ob_get_clean();
    }
}
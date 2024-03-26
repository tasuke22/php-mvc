<?php

namespace Framework;

class MVCTemplateViewer implements TemplateViewerInterface
{
    public function render(string $template, array $data = []): string
    {
        echo "MVCTemplateViewer class here";
        extract($data, EXTR_SKIP);
        ob_start();

        require dirname(__DIR__) . "/views/$template";

        return ob_get_clean();
    }
}
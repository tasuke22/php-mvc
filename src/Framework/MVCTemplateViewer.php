<?php

namespace app\Framework;

class MVCTemplateViewer
{
    public function render(string $template, array $data = []): string
    {
        extract($data, EXTR_SKIP);
        ob_start();

        require dirname(__DIR__) . "/views/$template";

        return ob_get_clean();
    }
}
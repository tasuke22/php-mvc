<?php

declare(strict_types=1);

namespace Framework;

class MVCTemplateViewer implements TemplateViewerInterface
{
    public function render(string $template, array $data = []): string
    {
        $views_dir = dirname(__DIR__) . "/views/";
        $code = file_get_contents($views_dir . "/$template");

        if (preg_match('#^{% extends "(?<template>.*)" %}#', $code, $matches) === 1) {

            $base = file_get_contents($views_dir . $matches['template']);

            $blocks = $this->getBlocks($code);
            print_r($blocks);
            exit;

        }


        $code = $this->replaceVariables($code);
        $code = $this->replacePHP($code);

        extract($data, EXTR_SKIP);
        ob_start();
        eval("?>$code");

        return ob_get_clean();
    }

    private function replaceVariables(string $code): string
    {
        return preg_replace("#{{\s*(\S+)\s*}}#", "<?= htmlspecialchars(\$$1) ?>", $code);
    }

    private function replacePHP(string $code): string
    {
        return preg_replace("#{%\s*(.+)\s*%}#", "<?php $1 ?>", $code);
    }

    private function getBlocks(string $code): array
    {
        preg_match_all("#{% block (?<name>\w+) %}(?<content>.*?){% endblock %}#s", $code, $matches, PREG_SET_ORDER);

        $blocks = [];
        foreach ($matches as $match) {
            $blocks[$match['name']] = $match['content'];
        }

        return $blocks;
    }
}
<?php

namespace App\Controllers;

abstract class BasicController
{
    public function outputInfo()
    {
        $loader = new \Twig\Loader\FilesystemLoader(__DIR__ . '/../../Views');
        return $twig = new \Twig\Environment($loader, []);
    }
}
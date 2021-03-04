<?php


namespace App;


class Router
{
    public function getUrl()
    {
        return $_SERVER['REQUEST_URI'];
    }
}
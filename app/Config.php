<?php


namespace App;


class Config
{
    protected $config;

    public function __construct()
    {
        $this->config = require __DIR__ . '/../.env.php';
    }

    public function get(string $name)
    {
        return $this->config[$name];
    }
}
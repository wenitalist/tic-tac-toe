<?php

require_once(__DIR__ . '/../vendor/autoload.php');

//$r = new \App\DB();
//$q = $r->query('SELECT * FROM users');
//var_dump($q->fetch());

$url_class = new \App\Router();
$url = $url_class->getUrl();

$controller_class = new \App\Controller();
$controller_class->check_url($url);

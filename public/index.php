<?php

require_once(__DIR__ . '/../vendor/autoload.php');

$r = new \App\DB();
$q = $r->query('SELECT * FROM users');
var_dump($q->fetch());

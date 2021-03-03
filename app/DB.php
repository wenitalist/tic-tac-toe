<?php

namespace App;

class DB
{
    protected \PDO $pdo;

    public function __construct()
    {
        $r = new \App\Config();
        $dsn = 'mysql:host=' . $r->get('db_host') . ';dbname=' . $r->get('db_name') . ';charset=utf8mb4;port=' . $r->get('db_port');
        $this->pdo = new \PDO($dsn, $r->get('db_user'), $r->get('db_password'), [
            \PDO::ATTR_ERRMODE => \PDO::ERRMODE_EXCEPTION,
            \PDO::ATTR_DEFAULT_FETCH_MODE => \PDO::FETCH_OBJ,
            \PDO::ATTR_EMULATE_PREPARES => false,
        ]);
    }

    public function query(string $sql, array $bindings = [])
    {
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute($bindings);
        return $stmt;
    }
}

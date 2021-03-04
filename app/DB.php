<?php

namespace App;

class DB
{
    private \PDO $pdo;

    public function __construct()
    {
        $config = new \App\Config();
        $dsn = 'mysql:host=' . $config->get('db_host') . ';dbname=' . $config->get('db_name') . ';charset=utf8mb4;port=' . $config->get('db_port');
        $this->pdo = new \PDO($dsn, $config->get('db_user'), $config->get('db_password'), [
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

<?php

namespace App;

class DB
{
    private static $_instance = null;

    protected function __construct() { }
    protected function __clone() { }

    const host = "localhost";
    const name_db   = "guest_book";
    const user = "admin";
    const pass = "secret";
    const port = "3306";
    const charset = 'utf8mb4';
    const options = [
        \PDO::ATTR_ERRMODE            => \PDO::ERRMODE_EXCEPTION,
        \PDO::ATTR_DEFAULT_FETCH_MODE => \PDO::FETCH_OBJ,
        \PDO::ATTR_EMULATE_PREPARES   => false,
    ];

    public function connect()
    {
        $dsn = 'mysql:host=' . self::host . ';dbname=' . self::name_db . ';charset=' . self::charset . ';port=' . self::port;
        $this->_instance = new PDO($dsn, self::user, self::pass, self::options);
    }

    public static function getInstance()
    {
        if (self::$_instance != null) {
            return self::$_instance;
        }
        return new self;
    }
}
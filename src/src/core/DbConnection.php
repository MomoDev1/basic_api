<?php

namespace App\Core;


class DbConnection
{
    private static $instance = null;

    private $connection = null;

    /**
     * @return DbConnection
     */
    public static function getInstance(): DbConnection
    {
        if (!self::$instance) {
            self::$instance = new self();
        }
        return self::$instance;
    }

    public static function displayTest()
    {
    }

    /**
     * DbConnection constructor.
     */
    private function __construct()
    {
        $this->connection = new \PDO('mysql:host=' . Config::getInstance()->get('db_host') .
            ';dbname=' . Config::getInstance()->get('db_name'), Config::getInstance()->get('db_user'),
            Config::getInstance()->get('db_pass'));
    }

    /**
     * @return \PDO
     */
    public function getConnection(): \PDO
    {
        return $this->connection;
    }
}
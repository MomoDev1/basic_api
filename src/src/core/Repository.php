<?php

namespace App\Core;


class Repository
{
    /**
     * @var \PDO
     */
    protected $connection;


    public function __construct()
    {
        $this->connection = $db = DbConnection::getInstance()->getConnection();
    }

}
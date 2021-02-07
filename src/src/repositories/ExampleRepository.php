<?php

namespace App\Repositories;


use App\Core\Repository;

class ExampleRepository extends Repository
{

    public function __construct()
    {
        parent::__construct();
    }

    /**
     * @return array
     */
    public function findAll(): array
    {
        return $this->connection->query("select * from example")
            ->fetchAll();
    }

}
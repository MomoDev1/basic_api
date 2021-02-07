<?php

namespace App\Core;


class Controller
{
    /**
     * @return array|null
     */
    public function getContent(): ?array
    {
        return json_decode(file_get_contents('php://input'), true);
    }

    public function getParamsData(): array
    {
        return $_POST;
    }

    public function getQueryData()
    {
        return $_GET;
    }

}
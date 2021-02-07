<?php

namespace App\Core;

use App\Core\Exception\ConfigException;

class Config
{

    private static $instance = null;

    private $setting = [];

    public static function getInstance()
    {
        if (!self::$instance) {
            self::$instance = new self();
        }
        return self::$instance;
    }


    private function __construct()
    {
        $this->setting = require_once $_SERVER['DOCUMENT_ROOT'] . '/config/config.php';
    }

    /**
     * @param $key
     * @return array
     * @throws ConfigException
     */
    public function get($key): array
    {
        if (isset($this->setting[$key])) {
            return $this->setting[$key];
        }
        throw new ConfigException('This key  : ' . $key . ' does\'t exist');
    }
}
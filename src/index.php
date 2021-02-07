<?php

require_once 'vendor/autoload.php';

$router = new \App\Core\Router\Router($_SERVER['REQUEST_URI'], $_SERVER['REQUEST_METHOD']);

$router->run();


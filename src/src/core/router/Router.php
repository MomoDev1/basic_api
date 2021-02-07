<?php

namespace App\Core\Router;

use App\Core\Config;

class Router
{
    /**
     * @var string $url
     */
    private $url;

    /**
     * @var string $method
     */
    private $method;

    /**
     * Router constructor.
     * @param string $url
     * @param string $method
     */
    public function __construct(string $url, string $method)
    {
        $this->url = $url;
        $this->method = $method;
    }

    public function run(): void
    {

        $controllers = Config::getInstance()->get('controllers');
        foreach ($controllers as $controller) {
            $class = new \ReflectionClass($controller);
            foreach ($class->getMethods() as $method) {
                $routes = $method->getAttributes(Route::class);
                if (empty($routes)) {
                    continue;
                }
                foreach ($routes as $route) {
                    $route = $route->newInstance();
                    /**
                     * @var Route $route
                     */
                    if ($route->match($this->url, $this->method)) {
                        echo json_encode($method->invokeArgs(new $controller, $route->getArgs($this->url)));
                    }
                }
            }
        }
    }
}
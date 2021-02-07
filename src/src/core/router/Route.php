<?php

namespace App\Core\Router;

use Attribute;


#[Attribute(Attribute::TARGET_METHOD)]
class Route
{
    /**
     * @var string $path
     */
    private $path;

    /**
     * @var string $method
     */
    private $method;

    /**
     * Router constructor.
     * @param string $path
     * @param string $method
     */
    public function __construct(string $path, string $method = 'get')
    {
        $this->method = $method;
        $this->path = $path;
    }

    /**
     * @return string
     */
    public function getPath(): string
    {
        return $this->path;
    }

    /**
     * @return string
     */
    public function getMethod(): string
    {
        return $this->method;
    }

    /**
     * @param string $url
     * @param string $method
     * @return bool
     */
    public function match(string $url, string $method): bool
    {
        if (strtolower($method) === strtolower($this->method)) {
            $regex = preg_replace('#{\w+}#', '[^/]+', $this->path);
            if (preg_match('#^' . $regex . '$#i', $url)) {
                return true;
            }
        }
        return false;
    }

    /**
     * @param string $url
     * @return array
     */
    public function getArgs(string $url) : array
    {
        $args = [];
        $keys = explode('/', $this->path);
        $value = explode('/', $url);
        for ($i = 0, $size = count($keys); $i < $size; $i++) {
            if (preg_match('#^{\w+}$#', $keys[$i])) {
                $key = substr($keys[$i], 1, -1);
                $args[$key] = $value[$i];
            }
        }
        return $args;
    }


}
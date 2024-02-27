<?php

namespace src;

class Router
{
    protected array $routes = [];

    public function get($url, $action)
    {
        $this->routes[$url] = $action;
    }

    public function dispatch()
    {
        $request_uri = $_SERVER['REQUEST_URI'];

        $callback = $this->routes[$request_uri];

        echo $callback();
    }
}
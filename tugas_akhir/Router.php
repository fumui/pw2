<?php

namespace EpubLib;
class Router
{
    protected $routes = [];

    public function get($route, $controllerAction)
    {
        $this->routes['GET'][$route] = $controllerAction;
    }

    public function dispatch()
    {
        $requestMethod = $_SERVER['REQUEST_METHOD'];
        $requestUri = $_SERVER['REQUEST_URI'];

        foreach ($this->routes[$requestMethod] as $route => $controllerAction) {
            if ($route === $requestUri) {
                [$controller, $action] = explode('@', $controllerAction);
                $controller = 'Controller\\' . $controller;

                $instance = new $controller();
                $instance->$action();

                return;
            }
        }

        // Handle 404 - Route not found
        echo '404 - Page not found';
    }
}
?>
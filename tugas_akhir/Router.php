<?php

namespace EpubLib;
class Router
{
    protected $routes = [];

    public function get($route, $controllerAction)
    {
        $this->routes['GET'][$route] = $controllerAction;
    }

    public function post($route, $controllerAction)
    {
        $this->routes['POST'][$route] = $controllerAction;
    }

    public function dispatch(){
    $requestMethod = $_SERVER['REQUEST_METHOD'];
    $requestUri = $_SERVER['REQUEST_URI'];
    
    // Parse the request URI to separate the path and query string
    $parsedUri = parse_url($requestUri);
    $path = $parsedUri['path'];
    $queryString = $parsedUri['query'] ?? '';

    foreach ($this->routes[$requestMethod] as $route => $controllerAction) {
        // Check if the path matches the route
        if ($route === $path) {
            [$controller, $action] = explode('@', $controllerAction);
            $controller = 'Controller\\' . $controller;

            // Pass the query string to the controller action
            $_GET = [];
            parse_str($queryString, $_GET);

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
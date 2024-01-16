<?php

namespace App\Routes;

class Route
{
    private static $routes = [];

    public static function get($url, $action)
    {
        self::addRoute('GET', $url, $action);
    }

    public static function post($url, $action)
    {
        self::addRoute('POST', $url, $action);
    }

    public static function put($url, $action)
    {
        self::addRoute('PUT', $url, $action);
    }

    public static function delete($url, $action)
    {
        self::addRoute('DELETE', $url, $action);
    }

    private static function addRoute($method, $url, $action)
    {
        self::$routes[] = [
            'method' => $method,
            'url' => $url,
            'action' => $action
        ];
    }

    public static function match($method, $url)
    {
        foreach (self::$routes as $route) {
            if($route['method'] == $method && $route['url'] == $url) {
                return $route;
            }
        }
        return null;
    }

    public static function dispatch()
    {
        $url = $_SERVER['REQUEST_URI'];
        $method = $_SERVER['REQUEST_METHOD'];

        echo "Route Dispatch to match method now... </br>" ;

        $route = self::match($method, $url);
        // print $route;
        if($route) {
            list($controller, $action) = explode('@', $route['action']);
            $controllerClass = 'App\\Controllers\\' . $controller;

            $instance = new $controllerClass();
            $instance->$action();
        } else {
            self::notFound();
        }
    }

    private static function notFound()
    {
        header("HTTP/1.1 404 Not Found");
        echo '404 Not Found';
    }
}
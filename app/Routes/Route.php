<?php

namespace App\Routes;

class Route
{
    public static function get($url, $action)
    {
        list($controller, $method) = explode('@', $action);
        $controllerClass = 'App\\Controllers\\' . $controller;

        // instantiate the controller and call the method
        $instance = new $controllerClass();
        $instance->$method();
    }
}
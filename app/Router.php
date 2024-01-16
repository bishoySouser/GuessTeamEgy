<?php

namespace App;
use App\Controllers\HomeController;

class Router
{
    public function route()
    {
        $url = $_SERVER['REQUEST_URI'];

        $this->home();

    }

    private function home()
    {
        $controller = new HomeController();
        $controller->index();
    }
}
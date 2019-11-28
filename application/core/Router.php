<?php
namespace application\core;

class Router {
    protected $routes = [];
    protected $params = [];

    public function __construct() {
        $arr = require 'application/config/routes.php';
        foreach ($arr as $key => $val) {
            $this->add($key, $val);
        }
    }

    public function add($route, $param) {
        $route = '#^'.$route.'$#';
        $this->routes[$route] = $param;
    }

    public function match() {
         $url = trim($_SERVER['REQUEST_URI'], '/');
         foreach ($this->routes as $route => $params) {
            if(preg_match($route, $url, $matches)){
                $this->params = $params;
                return true;
            }
         }
         return false;
    }

    public function run() {
        if($this->match()) {
            echo 'Маршрут найден';
        }
        }
}

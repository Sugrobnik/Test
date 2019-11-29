<?php

namespace application\core;

class Controller {
    public $route;
    public function __construct($route) {
        $this->route = $route;
    }
}
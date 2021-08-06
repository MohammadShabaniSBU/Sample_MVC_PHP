<?php

namespace app\core;

use route\RouteProvider; 

class Route {
    private Request $request;
    private static $routes = [];

    public function __construct(Request $request) {
        RouteProvider::makeRoutes();
        $this->request = $request;
    }

    public static function get($path, $callback) {
        self::$routes['GET'][$path] = $callback;
    } 


    public static function post($path, $callback) {
        self::$routes['POST'][$path] = $callback;
    } 

    public function resolve() {

        $callback = self::$routes[$this->request->getMethod()][$this->request->getPath()];

        if (is_array($callback))
            $callback[0] = new $callback[0];

        call_user_func($callback, $this->request);
    }
}

?>

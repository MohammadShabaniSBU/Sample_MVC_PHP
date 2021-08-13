<?php

namespace app\core;

use route\RouteProvider; 

class Routes {
    private Request $request;
    private static $routes = [];

    public function __construct(Request $request) {
        RouteProvider::makeRoutes();
        $this->request = $request;
    }

    public static function get($path, $callback) {
       return self::$routes['GET'][] = new Route($path, $callback);
    } 


    public static function post($path, $callback) {
        return self::$routes['POST'][] = new Route($path, $callback);
    } 

    public function resolve() {

        if ($this->request->getPath() == '/') {
            Redirect::to('/home')->go();
            return;
        }

        foreach (self::$routes[$this->request->getMethod()] as $route)
            if ($route->check($this->request->getPath())) {
                $route->run();
                return;
            }

    }
}

?>

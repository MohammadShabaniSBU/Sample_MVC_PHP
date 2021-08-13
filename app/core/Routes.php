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

        foreach (self::$routes[$this->request->getMethod()] as $route)
            if ($route->check($this->request->getPath())) {
                $route->run();
                return;
            }

        echo "eshteb zadi";
        // redirect to 404 page

    }

    public static function getPathByName(string $name) : string {
        foreach (self::$routes['GET'] as $route)
            if ($route->getName() == $name)
                return $route->getURL();

        foreach (self::$routes['POST'] as $route)
            if ($route->getName() == $name)
                return $route->getURL();

        return '/';
    }
}

?>

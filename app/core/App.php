<?php

namespace app\core;

class App {

    /**
     * store the root path.
     */
    public static string $root;
    private Route $route;
    private Request $request;

    public function __construct() {
        self::$root = substr($_SERVER['DOCUMENT_ROOT'], 0, strlen($_SERVER['DOCUMENT_ROOT']) - 7);
        $this->request = new Request();
        $this->route = new Route($this->request);
    }

    public function run() {
        $this->route->resolve();
    }
}

?>

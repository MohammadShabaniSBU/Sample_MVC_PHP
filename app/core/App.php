<?php

namespace app\core;

class App {

    /**
     * store the root path.
     */
    public static string $root;
    private static ?App $instance = null;
    private Routes $route;
    private Request $request;

    private function __construct() {
        self::$root = substr($_SERVER['DOCUMENT_ROOT'], 0, strlen($_SERVER['DOCUMENT_ROOT']) - 7);
        Session::start();
        $this->request = new Request();
        $this->route = new Routes($this->request);
    }

    public static function getInstance() {
        if (self::$instance == null)
            self::$instance = new App();

        return self::$instance;
    }

    public function getRequest() {
        return $this->request;
    }

    public function run() {
        $this->route->resolve();
    }
}

?>

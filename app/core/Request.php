<?php

namespace app\core;

class Request {
    private string $path;

    public function __construct() {
        $this->path = $_SERVER['PATH_INFO'] ?? '/';
    }

    /**
     * get the exat path of route
     * 
     * @return string
     */
    public function getPath() : string {
        return $this->path;
    }

    /**
     * get the http method which request is sent by
     * 
     * @return string
     */
    public function getMethod() {
        return $_POST['method'] ?? $_SERVER['REQUEST_METHOD'];
    }

    /**
     * get the inputs which is sent via htttp request
     * 
     * @return array|null 
     */
    public function getParams() {
        return $_POST ?? $_GET;
    }
}

?>

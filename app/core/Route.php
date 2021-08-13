<?php

namespace app\core;

class Route {
    private $path;
    private $callback;
    private string $name;
    private $middleware = null;

    public function __construct(string $path, $callback) {
        $this->path = $path;
        $this->callback = $callback;
    }

    public function check(string $path) : bool {
        return preg_match($this->makeRegex(), $path);
    }

    public function name(string $name) : Route {
        $this->name = $name;
        return $this;
    }

    public function getName() : string {
        return $this->name;
    }

    private function makeRegex() : string {
        return '/^' . preg_replace("/\//", '\\/', $this->path) . '$/';
    }

    public function middleware($middleware) : Route {
        $this->middleware = $middleware;
        return $this;
    }

    public function runFunction(string $className, string $methodName) {
        return call_user_func([new $className, $methodName]);
    }

    public function run() {
        if (is_array($this->callback))
            $this->callback[0] = new $this->callback[0];


        if ($this->middleware == null || $this->runFunction($this->middleware, 'check'))
            call_user_func($this->callback, App::getInstance()->getRequest());
        else
            $this->runFunction($this->middleware, 'redirect');
    }

    public function makeArgs() {
        return [];
    }
}
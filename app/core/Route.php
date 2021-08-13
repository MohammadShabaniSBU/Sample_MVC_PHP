<?php

namespace app\core;

class Route {
    private $path;
    private $callback;
    private string $name = '';
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

    public function getURL() {
        return $this->path;
    }

    private function makeRegex() : string {
        $temp = preg_replace('/{\w+}/','(\\w+)', $this->path);

        return '/^' . preg_replace("/\//", '\\/', $temp) . '$/';
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
            call_user_func_array($this->callback, $this->makeArgs());
        else
            $this->runFunction($this->middleware, 'redirect');
    }

    public function makeArgs() {
        $args = [];
        if (App::getInstance()->getRequest()->getParams() != [])
            $args[] = App::getInstance()->getRequest();

        $matches = [];
        preg_match($this->makeRegex(), App::getInstance()->getRequest()->getPath(), $matches);

        unset($matches[0]);

        return array_merge($args, $matches);;
    }
}
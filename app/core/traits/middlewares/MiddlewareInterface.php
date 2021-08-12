<?php

namespace app\core\traits\middlewares;

trait MiddlewareInterface {
    /**
     *
     * @return bool
     */
    protected abstract function check() : bool;

    /**
     * this function will redirect user to target page
     *
     * @return void
     */
    protected abstract function redirect() : void;
}
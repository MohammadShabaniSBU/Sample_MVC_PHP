<?php

namespace app\middlewares;

interface MiddlewareInterface {

    public function check() : bool;

    public function redirect();
}
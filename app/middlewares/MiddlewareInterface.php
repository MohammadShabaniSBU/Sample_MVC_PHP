<?php

namespace app\middlewares;

interface MiddlewareInterface {

    public function check();

    public function redirect();
}
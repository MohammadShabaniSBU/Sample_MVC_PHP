<?php

namespace app\middlewares;

use app\core\Auth as User;
use app\core\Redirect;

class Auth implements MiddlewareInterface {

    public function check() : bool {
        return User::getInstance()->isLogin();
    }

    public function redirect() {
        Redirect::to('/signIn')->go();
    }
}
<?php

namespace app\core\traits\middlewares;

use app\core\Auth as User;
use app\core\Redirect;

trait Auth {
    use MiddlewareInterface;

    protected function check(): bool {
        return User::getInstance()->isLogin();
    }

    protected function redirect(): void {
        Redirect::to('/signIn')->go();
    }
}
<?php

namespace app\core\traits\middlewares;

use app\core\Auth;
use app\core\Redirect;

trait Admin {
    use MiddlewareInterface;

    protected function check(): bool {
        return Auth::getInstance()->isLogin() && Auth::getInstance()->getType() == 'admin';
    }

    protected function redirect(): void {
        Redirect::to('/signUp')->go();
    }
}
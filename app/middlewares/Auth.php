<?php

namespace app\middlewares;

use app\core\Auth as User;
use app\models\User as UserModel;
use app\core\Redirect;

class Auth implements MiddlewareInterface {
    private static array $message = [];

    public function check() : bool {
        if (User::getInstance()->isLogin()) {
            if (!UserModel::Do()->isBan(User::getInstance()->getId())) {
                return true;
            } else {
                self::$message['errorMessage'] = "Your account is banned.";
                return false;
            }
        } else {
            self::$message['warningMessage'] = "You must be a user";
            return false;
        }
    }

    public function redirect() {
        Redirect::to('/signIn')->data(self::$message)->go();
    }
}
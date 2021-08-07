<?php

namespace app\models;

use app\core\Model;

class User extends Model {
    private static $instance = null;

    public static function Do() {
        
        if (self::$instance == null)
            self::$instance = new User('users');

        return self::$instance;
    }

    public function validateSignIn(string $email, string $password) {
        return $this->select()->where('email', $email)->where('password', md5($password))->fetch()['id'] ?? false;
    }

}
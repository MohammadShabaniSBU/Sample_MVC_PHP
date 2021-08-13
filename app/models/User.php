<?php

namespace app\models;

use app\core\Model;

class User extends Model {

    public static function Do() {

        return new User('users');
    }

    public function validateSignIn(string $email, string $password) {
        return $this->select()->where('email', $email)->where('password', md5($password))->fetch()['id'] ?? false;
    }

    public function getUserById(int $id) {
        return $this->select()->where('id', $id)->fetch();
    }

    public function getAllUsers() : array {

        echo '<pre>';
        print_r('');
        echo '</pre>';
        return $this->select()->fetchAll();
    }

}
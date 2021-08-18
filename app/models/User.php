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

    public function editProfile(array $data, int $id) {
        $this->update($data)->where('id', $id)->execute();
    }

    public function getUserById(int $id) {
        return $this->select()->where('id', $id)->fetch();
    }

    public function getAllUsers() : array {
        return $this->select()->fetchAll();
    }

    public function setStatus(int $id, int $state) : void {
        $this->update(['status' => $state])->where('id', $id)->execute();
    }

    public function isBan($id) {
        return $this->select('status')->where('id', $id)->fetch()['status'] == 0;
    }

}
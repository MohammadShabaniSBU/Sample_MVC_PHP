<?php

namespace app\core;

use app\models\User;

class Auth {
    private static ?Auth $instance = null;
    private array $user = [];

    private function __construct() {
        $this->check();
    }

    public static function getInstance() {
        if (self::$instance == null)
            self::$instance = new Auth();

        return self::$instance;
    }

    public function check() {
        if (!isset($_COOKIE['user_id']))
            return;

        $this->user = User::Do()->getUserById($_COOKIE['user_id']);
    }

    public function getName() {
        return $this->user['firstname'] . ' ' . $this->user['lastname'];
    }

    public function getId() {
        return $this->user['id'];
    }
}
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

    public function isLogin() {
        return $this->user != [];
    }

    public function isConfirmer() : bool {
        return $this->isAdmin() || $this->getType() == 'confirmer';
    }

    public function isAdmin() {
        return $this->getType() == 'admin';
    }

    public function getName() {
        return $this->user['firstname'] . ' ' . $this->user['lastname'];
    }

    public function getFirstname() : string {
        return $this->user['firstname'];
    }

    public function getLastname() : string {
        return $this->user['lastname'];
    }

    public function getEmail() : string {
        return $this->user['email'];
    }

    public function getImageUrl() : string {
        return $this->user['image_url'];
    }

    public function getType() {
        return $this->user['type'];
    }

    public function getId() {
        return $this->user['id'];
    }
}
<?php

namespace app\core;

class Response {
    
    public static function setUserCookie(string $userId) {
        setcookie('user_id', $userId, [
            'path' => '/',
            'expires' => time() + 86400,
        ]);
    }

    public static function unsetUserCookie() {
        setcookie('user_id', 0, [
            'path' => '/',
            'expires' => time() - 1,
        ]);
    }
}
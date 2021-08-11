<?php

namespace app\core;

class Session {
    public static function start() {
        session_start();
    }

    public static function add(string $key, $value) {
        $_SESSION[$key] = $value;
    }

    public static function read(string $key) {
        return $_SESSION[$key];
    }

    public static function close() {
        session_destroy();
    }
}
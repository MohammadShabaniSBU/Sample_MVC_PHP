<?php

namespace app\core;

class Error {
    private static $instance = null;
    private $errors = [];

    private function __construct() {}

    public static function getInstance() {
        if (self::$instance == null)
            self::$instance = new Error();

        return self::$instance;
    }

    public function addError($errorName, $errorMessage) {
        $this->errors[$errorName][] = $errorMessage;
    }

    public function hasError() : bool {
        return $this->errors != [];
    }

    public function hasErrorName($errorName) : bool {
        return array_key_exists($errorName, $this->errors);
    }

    public function getError($errorName) {
        return $this->errors[$errorName];
    }
    
}
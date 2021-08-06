<?php

namespace app\core;

class Error {
    private static $instance = null;
    private $errors = [];

    private function __construct() {}

    public static function getInstance() : Error {
        if (self::$instance == null)
            self::$instance = new Error();

        return self::$instance;
    }

    public function addError(string $errorName, string $errorMessage) : void {
        $this->errors[$errorName][] = $errorMessage;
    }

    public function hasError() : bool {
        return $this->errors != [];
    }

    public function hasErrorName(string $errorName) : bool {
        return array_key_exists($errorName, $this->errors);
    }

    public function getError(string $errorName) : array {
        return $this->errors[$errorName];
    }
    
}
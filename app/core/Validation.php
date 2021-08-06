<?php

namespace app\core;

class Validation {
    private static $instance = null;
    private $rules = null;
    private $data = null;

    private function __construct() {}

    public static function make() {
        if (self::$instance == null)
            self::$instance = new Validation();

        return self::$instance;
    }

    public function rules($rules) {
        $this->rules = $rules;
    }

    public function data($data) {
        $this->data = $data;
    }

    public function validate() {
        foreach ($this->rules as $param => $conditions) {

            if (!array_key_exists($param, $this->data)) {
                // add error
                continue;
            }

            foreach ($conditions as $condition) {
                $function = is_array($condition) ? $condition[0] : $condition;
                $args = is_array($condition) ? (
                    count($condition) > 2 ? array_slice($condition, 1) : $condition[1]
                ) : null;

                call_user_func([$this, $function], $param, $args);
            }
        }

    }

    private function username(string $param) {
        if (preg_match("/^[a-zA-Z0-9_]+$/", trim($this->data[$param])) === 0)
            Error::getInstance()->addError($param,
                "Username must only contains alphabetic characters ,numbers and underline."
            );

    }

    private function alphabetic(string $param) {
        if (preg_match("/^[a-zA-Z]+$/", trim($this->data[$param])) === 0)
            Error::getInstance()->addError($param,
                "$param must only contains alphabetic characters."
            );
    }

    private function numeric(string $param) {
        if (preg_match("/^[0-9]+$/", trim($this->data[$param])) === 0)
            Error::getInstance()->addError($param,
                "$param must only contains numbers."
            );
    }

    private function email(string $param) {
        if (preg_match("/^[a-zA-Z][a-zA-Z0-9_.]*@[a-zA-Z0-9.]+\.[a-z]{2,5}$/", trim($this->data[$param])) === 0)
            Error::getInstance()->addError($param,
                "It is not an email format."
            );
    }

    private function min(string $param, $min) {
        if (trim($this->data[$param]) < $min)
            Error::getInstance()->addError($param,
                "amount $param must be greater than $min"
            );
    }

    private function max(string $param, $max) {
        if (trim($this->data[$param]) > $max)
            Error::getInstance()->addError($param,
                "amount $param must be less than $max"
        );
    }

    private function minLen(string $param, $min) {
        if (strlen(trim($this->data[$param])) < $min)
            Error::getInstance()->addError($param,
                "the length of $param must be greater than $min"
            );
    }

    private function maxLen(string $param, $max) {
        if (strlen(trim($this->data[$param])) > $max)
            Error::getInstance()->addError($param,
                "the length of  $param must be less than $max"
            );
    }

    private function size(string $param, $size) {

    }

    private function type(string $param, $types) {

    }
}
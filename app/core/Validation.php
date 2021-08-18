<?php

namespace app\core;

use app\core\traits\Formatter;

class Validation {
    use Formatter;

    private static $instance = null;
    private ?array $rules = null;
    private ?array $data = null;
    private ?array $files = null;

    private function __construct() {}

    public static function make() {
        if (self::$instance == null)
            self::$instance = new Validation();

        return self::$instance;
    }

    public function rules($rules) {
        $this->rules = $rules;
        return $this;
    }

    public function data(array $data) : Validation {
        $this->data = $data;
        return $this;
    }

    public function files(array $files) : Validation {
        $this->files = $files;
        return $this;
    }

    public function validate() {
        foreach ($this->rules as $param => $conditions) {

            foreach ($conditions as $condition) {
                $function = is_array($condition) ? $condition[0] : $condition;
                $args = is_array($condition) ? (
                    count($condition) > 2 ? array_slice($condition, 1) : $condition[1]
                ) : null;

                if (call_user_func([$this, $function], $param, $args) === false)
                    break;
            }
        }
    }

    private function required(string $param) : bool {
        if (!array_key_exists($param, $this->data) && !(array_key_exists($param, $this->files) && $this->files[$param]['size'] > 0)) {
            Error::getInstance()->addError($param, "$param input must exist");
            return false;
        }

        return true;
    }

    private function optional(string $param) : bool {
        if (!array_key_exists($param, $this->data) && !(array_key_exists($param, $this->files) && $this->files[$param]['size'] > 0))
            return false;

        return true;
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

    private function alphanumeric(string $param) {
        if (preg_match("/^[a-zA-Z0-9]+$/", trim($this->data[$param])) === 0)
            Error::getInstance()->addError($param,
                "$param must only contains alphabetic and numeric characters."
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
                "amount of $param must be greater than $min"
            );
    }

    private function max(string $param, $max) {
        if (trim($this->data[$param]) > $max)
            Error::getInstance()->addError($param,
                "amount of $param must be less than $max"
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

    private function confirmation(string $param) {
        if (!array_key_exists($param . '-confirmation', $this->data)) {
            Error::getInstance()->addError($param,
                "your $param must be confirmed",
            );
            return;
        }

        if ($this->data[$param . '-confirmation'] != $this->data[$param])
            Error::getInstance()->addError($param . "-confirmation",
                "$param doesn't match $param confirmation",
            );
    }

    private function size(string $param, $size) {

        if ($this->files[$param]['size'] > $size)
            Error::getInstance()->addError($param, "Your $param can be at last {$this->formatSize($size)}.");
    }

    private function type(string $param, $types) {
        $ok = false;
        $fileType = strtolower(pathinfo($this->files[$param]['name'],PATHINFO_EXTENSION));

        if (is_string($types)) {

            if ($fileType == $types)
                $ok = true;
        } else {

            foreach ($types as $type)
                if ($type == $fileType) {
                    $ok = true;
                    break;
                }
        }

        $types = is_array($types) ? $this->format($types) : $types;
        if (!$ok)
            Error::getInstance()->addError($param, "Your $param must be one of the following types: {$types}.");

    }

}
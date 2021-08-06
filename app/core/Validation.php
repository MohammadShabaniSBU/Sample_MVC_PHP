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
                if (is_array($conditions))
                    call_user_func([$this, $conditions[0]], $param, $condition[1]);
                else
                    call_user_func([$this, $condition], $param);
            }
        }

    }

    private function username($param) {

    }

    private function alphabic($param) {

    }

    private function numeric($param) {

    }

    private function email($param) {

    }

    private function min($param, $min) {

    }

    private function max($param, $max) {

    }

    private function size($param, $size) {

    }

    private function type($param, $types) {

    }
}
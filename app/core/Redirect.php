<?php

namespace app\core;

class Redirect {
    private static ?Redirect $instance = null;
    private string $target;

    private function __construct(string $target) {
        $this->target = $target;
    }

    public static function to(string $target) {
        if (self::$instance == null)
            self::$instance = new Redirect($target);

        return self::$instance;
    }

    public function data(array $data) {

        foreach ($data as $key => $value)
            Session::add($key, $value);
        return $this;
    }

    public function go() {
        header("Location: {$this->target}");
    }
}
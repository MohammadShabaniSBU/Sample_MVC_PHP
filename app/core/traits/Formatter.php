<?php

namespace app\core\traits;

trait ForamtArray {

    private function format(array $targets, string $prefix = '', string $starter = '', string $finisher = '', string $separator = ',') {
        $string = $starter;

        foreach ($targets as $target) {

            $string .= $prefix . $target . $separator;
        }

        return preg_replace("/{$separator}$/", $finisher, $string);
    }

    private function formatEquation($targets) {
        $string = '';

        foreach ($targets as $target)
            $string .= "$target=:$target,";

        return substr($string, 0, strlen($string) - 1);
    }
}
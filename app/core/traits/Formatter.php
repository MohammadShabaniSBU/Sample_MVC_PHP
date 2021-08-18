<?php

namespace app\core\traits;

trait Formatter {

    protected function format(array $targets, string $prefix = '', string $starter = '', string $finisher = '', string $separator = ', ', string $side = '') {
        $string = $starter;

        foreach ($targets as $target) {

            $string .= $prefix . $side . $target . $side . $separator;
        }

        return preg_replace("/{$separator}$/", $finisher, $string);
    }

    protected function formatEquation($targets) {
        $string = '';

        foreach ($targets as $target)
            $string .= "`$target`=:$target,";

        return substr($string, 0, strlen($string) - 1);
    }

    public function formatSize(int $size) {

        if ($size > 1000 * 1000)
            return ((int)(($size / (1000 * 1000)) * 100)) / 100 . ' MB';
        else if ($size > 1000)
            return ((int)(($size / 1000) * 100)) / 100 . ' KB';
        else
            return $size . ' B';
    }
}
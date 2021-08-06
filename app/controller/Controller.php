<?php

namespace app\controller;

use app\core\View;

class Controller {
    protected function render($viewName, $params) {
        View::make()->addMainLayout()->renderView($viewName, $params);
    }
}
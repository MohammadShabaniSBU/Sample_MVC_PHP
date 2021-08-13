<?php

namespace app\middlewares;

class Admin extends Auth {

    public function check() {
        return parent::check() && \app\core\Auth::getInstance()->isAdmin();
    }

}
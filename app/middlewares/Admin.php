<?php

namespace app\middlewares;

class Admin extends Auth {

    public function check() : bool {
        return parent::check() && \app\core\Auth::getInstance()->isAdmin();
    }

}
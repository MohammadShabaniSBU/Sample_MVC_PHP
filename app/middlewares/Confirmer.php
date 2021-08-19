<?php

namespace app\middlewares;

class Confirmer extends Auth {

    public function check() : bool {
        return parent::check() && \app\core\Auth::getInstance()->isConfirmer();
    }

}
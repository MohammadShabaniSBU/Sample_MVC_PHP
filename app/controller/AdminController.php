<?php

namespace app\controller;

use app\core\traits\middlewares\Admin;

class AdminController extends Controller {
    use Admin;

    public function showRequests() {

        if (!$this->check()) {
            $this->redirect();
            return;
        }

        $this->render('dashboard/requests', ['title' => 'Requested Files']);
    }

    public function showUsers() {

        if (!$this->check()) {
            $this->redirect();
            return;
        }

        $this->render('dashboard/users', ['title' => 'Users Management']);
    }

    public function showSettings() {

        if (!$this->check()) {
            $this->redirect();
            return;
        }

        $this->render('dashboard/settings', ['title' => 'Settings']);
    }
}
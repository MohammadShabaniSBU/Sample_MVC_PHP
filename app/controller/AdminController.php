<?php

namespace app\controller;


use app\core\Request;

class AdminController extends Controller {

    public function showRequests() {

        $this->render('dashboard/requests', ['title' => 'Requested Files']);
    }

    public function showUsers() {

        $this->render('dashboard/users', ['title' => 'Users Management']);
    }

    public function showSettings() {

        $this->render('dashboard/settings', ['title' => 'Settings']);
    }

    public function changeUserStatus(Request $request, $id) {
        echo $id;
    }
}
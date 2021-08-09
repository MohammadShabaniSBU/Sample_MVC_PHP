<?php

namespace app\controller;

class AdminController extends Controller {
    public function showRequests() {

        $this->render('dashboard/requests', ['title' => 'Requested Files']);
    }

    public function showUsers() {

        $this->render('dashboard/users', ['title' => 'Users Management']);
    }
}
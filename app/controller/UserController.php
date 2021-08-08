<?php

namespace app\controller;

class UserController extends Controller {
    public function showFiles() {

        $this->render('userDashboard/files', ['title' => 'Files']);
    }

    public function showProfile() {

        $this->render('userDashboard/profile', ['title' => 'Profile']);
    }
}
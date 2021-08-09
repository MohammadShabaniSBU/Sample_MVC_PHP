<?php

namespace app\controller;

class UserController extends Controller {
    public function showUploads() {

        $this->render('dashboard/uploads', ['title' => 'Uploaded Files']);
    }

    public function showDownloads() {

        $this->render('dashboard/downloads', ['title' => 'Downloaded Files']);
    }

    public function showProfile() {

        $this->render('dashboard/profile', ['title' => 'Profile']);
    }
}
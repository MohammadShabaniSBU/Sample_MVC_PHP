<?php

namespace app\controller;

use app\models\User;

class HomeController extends Controller {
    public function index() {
        // $this->render('home', ['title' => "home"]);
        User::Do()->delete()->where('firstname', 'ali')->execute();

        // print_r(User::Do()->select(['id', 'firstname', 'email'])->where('firstname', 'm%' , 'LIKE')->fetch());
    }
}
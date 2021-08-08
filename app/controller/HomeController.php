<?php

namespace app\controller;

use app\models\User;

class HomeController extends Controller {
    public function index() {
         $this->render('home', ['title' => "home"]);
    }
}
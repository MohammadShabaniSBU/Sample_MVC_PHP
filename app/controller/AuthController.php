<?php

namespace app\controller;

use app\core\Request;

class AuthController extends Controller {

    public function showSignIn(){
        $this->render('signIn', ['title' => 'Sign In']);
    }

    public function showSignUp(){
        $this->render('signUp', ['title' => 'Sign Up']);
    }

    public function signIn(Request $request) {

    }

    public function signUp(Request $request) {

    }

}
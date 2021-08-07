<?php

namespace app\controller;

use app\core\Error;
use app\core\Request;
use app\core\Validation;
use app\core\View;
use app\models\User;

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
        $request = $request->getParams();

        Validation::make()->rules($this->signInRules())->data($request)->validate();

        if (Error::getInstance()->hasError()) {
            $this->render('signUp', ['title' => 'Sign Up']);
            return;
        }

        User::Do()->insert($this->makeSignUpModelData($request))->execute();

        header("Location: /signIn");


    }

    private function signInRules() {

        return [
            'firstname' => [
                'alphabetic',
                ['minLen', 4],
                ['maxLen', 16],
            ],
            'lastname' => [
                'alphabetic',
                ['minLen', 4],
                ['maxLen', 16],
            ],
            'email' => [
                'email',
            ],
            'password' => [
                'confirmation'
            ]
        ];
    }

    private function makeSignUpModelData($request) {
        return [
            'firstname' => $request['firstname'],
            'lastname' => $request['lastname'],
            'email' => $request['email'],
            'password' => md5($request['password']),
            'type' => 'normal',
        ];
    }

}
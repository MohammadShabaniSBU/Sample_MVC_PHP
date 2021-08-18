<?php

namespace app\controller;

use app\core\Error;
use app\core\Redirect;
use app\core\Request;
use app\core\Response;
use app\core\Validation;
use app\models\User;

class AuthController extends Controller {

    public function showSignIn(){
        $this->render('signIn', ['title' => 'Sign In']);
    }

    public function showSignUp(){
        $this->render('signUp', ['title' => 'Sign Up']);
    }

    public function signIn(Request $request) {
        $request = $request->getParams();

        $id = User::Do()->validateSignIn($request['email'], $request['password']);
        if ($id !== false) {

            Response::setUserCookie($id);
            Redirect::to('/dashboard/uploads')->go();
        } else {

            Error::getInstance()->addError('signIn', "email and password don't match :(");
            Redirect::to('/signIn')->data(['errors' => Error::getInstance()])->go();
        }
    }

    public function signUp(Request $request) {
        $request = $request->getParams();

        Validation::make()->rules($this->signUpRules())->data($request)->validate();

        if (Error::getInstance()->hasError()) {
            Redirect::to('/signUp')->data(['errors' => Error::getInstance()])->go();
            return;
        }

        User::Do()->insert($this->makeSignUpModelData($request))->execute();

        Redirect::to('/signIn')->go();


    }

    public function logout() {
        Response::unsetUserCookie();
        Redirect::to('/')->go();
    }

    private function signUpRules() {

        return [
            'firstname' => [
                'required',
                'alphabetic',
                ['minLen', 4],
                ['maxLen', 16],
            ],
            'lastname' => [
                'required',
                'alphabetic',
                ['minLen', 4],
                ['maxLen', 16],
            ],
            'email' => [
                'required',
                'email',
            ],
            'password' => [
                'required',
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
        ];
    }

}
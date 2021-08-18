<?php

namespace app\controller;


use app\core\Redirect;
use app\core\Request;
use app\core\Routes;
use app\models\File;
use app\models\User;

class AdminController extends Controller {

    public function showRequests() {

        $this->render('dashboard/requests', ['title' => 'Requested Files', 'page' => 'request']);
    }

    public function showUsers() {

        $this->render('dashboard/users', ['title' => 'Users Management', 'page' => 'users']);
    }

    public function showSettings() {

        $this->render('dashboard/settings', ['title' => 'Settings', 'page' => 'setting']);
    }

    public function changeUserStatus(Request $request, $id) {
        switch ($request->getParams()['action']) {
            case 'active':
                User::Do()->setStatus($id, 1);
                break;
            case 'disactive':
                User::Do()->setStatus($id, 0);
        }

        Redirect::to(Routes::getPathByName('user management'))->go();
    }

    public function changeFileStatus(Request $request) {
        $id = $request->getParams()['file_id'];

        switch ($request->getParams()['action']) {
            case 'Confirm':
                File::Do()->setFileStatus($id, 1);
                break;
            case 'Reject':
                File::Do()->setFileStatus($id, -1);
        }

        Redirect::to(Routes::getPathByName('requests'))->go();
    }
}
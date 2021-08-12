<?php

namespace route;

use app\core\Routes;
use app\core\View;

use app\controller\AdminController;
use app\controller\UserController;
use app\controller\HomeController;
use app\controller\AuthController;

class RouteProvider {
    public static function makeRoutes() {
        
        // define all your routes here

        Routes::get('/test', function() {
            View::make()->addMainLayout()->renderView('test', ['title' => "test"]);
        });

        Routes::get('/', [HomeController::class, 'index']);

        Routes::get('/signIn', [AuthController::class, 'showSignIn']);
        Routes::get('/signUp', [AuthController::class, 'showSignUp']);

        Routes::post('/signIn', [AuthController::class, 'signIn']);
        Routes::post('/signUp', [AuthController::class, 'signUp']);
        Routes::post('/logout', [AuthController::class, 'logout']);

        Routes::get('/dashboard/downloads', [UserController::class, 'showDownloads']);
        Routes::get('/dashboard/uploads', [UserController::class, 'showUploads']);
        Routes::get('/dashboard/requests', [AdminController::class, 'showRequests']);
        Routes::get('/dashboard/users', [AdminController::class, 'showUsers']);
        Routes::get('/dashboard/settings', [AdminController::class, 'showSettings']);
        Routes::get('/dashboard/profile', [UserController::class, 'showProfile']);

        Routes::post('/uploadFile', [UserController::class, 'upload']);
    }
}

?>

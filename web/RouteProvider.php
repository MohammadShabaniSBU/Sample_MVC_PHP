<?php

namespace route;

use app\core\Redirect;
use app\core\Routes;
use app\core\View;

use app\controller\AdminController;
use app\controller\UserController;
use app\controller\HomeController;
use app\controller\AuthController;

class RouteProvider {
    public static function makeRoutes() {
        
        // define all your routes here

        Routes::get('/', function () {
            Redirect::to('/home')->go();
        });
        Routes::get('/home', [HomeController::class, 'index']);

        Routes::get('/signIn', [AuthController::class, 'showSignIn']);
        Routes::get('/signUp', [AuthController::class, 'showSignUp']);

        Routes::post('/signIn', [AuthController::class, 'signIn']);
        Routes::post('/signUp', [AuthController::class, 'signUp']);
        Routes::post('/logout', [AuthController::class, 'logout']);

        Routes::get('/dashboard/downloads', [UserController::class, 'showDownloads'])
            ->middleware(\app\middlewares\Auth::class);

        Routes::get('/dashboard/uploads', [UserController::class, 'showUploads'])
            ->middleware(\app\middlewares\Auth::class);

        Routes::get('/dashboard/requests', [AdminController::class, 'showRequests'])
            ->middleware(\app\middlewares\Admin::class);

        Routes::get('/dashboard/users', [AdminController::class, 'showUsers'])
            ->middleware(\app\middlewares\Admin::class);

        Routes::get('/dashboard/settings', [AdminController::class, 'showSettings'])
            ->middleware(\app\middlewares\Admin::class);

        Routes::get('/dashboard/profile', [UserController::class, 'showProfile'])
            ->middleware(\app\middlewares\Auth::class);

        Routes::post('/uploadFile', [UserController::class, 'upload'])
            ->middleware(\app\middlewares\Auth::class);

    }
}

?>

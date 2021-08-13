<?php

namespace route;

use app\core\Redirect;
use app\core\Routes;
use app\core\View;

use app\controller\AdminController;
use app\controller\UserController;
use app\controller\HomeController;
use app\controller\AuthController;
use app\models\User;

class RouteProvider {
    public static function makeRoutes() {
        
        // define all your routes here

        Routes::get('/', function () {
            Redirect::to('/home')->go();
        });
        Routes::get('/home', [HomeController::class, 'index'])
            ->name('home');

        Routes::get('/signIn', [AuthController::class, 'showSignIn'])
            ->name('sign in page');
        Routes::get('/signUp', [AuthController::class, 'showSignUp'])
            ->name('sign up page');

        Routes::post('/signIn', [AuthController::class, 'signIn'])
            ->name('sign in');
        Routes::post('/signUp', [AuthController::class, 'signUp'])
            ->name('sign up');
        Routes::post('/logout', [AuthController::class, 'logout'])
            ->name('logout');

        Routes::get('/dashboard/downloads', [UserController::class, 'showDownloads'])
            ->middleware(\app\middlewares\Auth::class)
            ->name('downloads');

        Routes::get('/dashboard/uploads', [UserController::class, 'showUploads'])
            ->middleware(\app\middlewares\Auth::class)
            ->name('uploads');

        Routes::get('/dashboard/requests', [AdminController::class, 'showRequests'])
            ->middleware(\app\middlewares\Admin::class)
            ->name('requests');

        Routes::get('/dashboard/users', [AdminController::class, 'showUsers'])
            ->middleware(\app\middlewares\Admin::class)
            ->name('user management');

        Routes::get('/dashboard/settings', [AdminController::class, 'showSettings'])
            ->middleware(\app\middlewares\Admin::class)
            ->name('settings');

        Routes::get('/dashboard/profile', [UserController::class, 'showProfile'])
            ->middleware(\app\middlewares\Auth::class)
            ->name('profile');

        Routes::post('/uploadFile', [UserController::class, 'upload'])
            ->middleware(\app\middlewares\Auth::class)
            ->name('upload');

    }
}

?>

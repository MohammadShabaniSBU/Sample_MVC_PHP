<?php

namespace route;

use app\core\Route;
use app\core\View;

use app\controller\AdminController;
use app\controller\UserController;
use app\controller\HomeController;
use app\controller\AuthController;

class RouteProvider {
    public static function makeRoutes() {
        
        // define all your routes here

        Route::get('/test', function() {
            View::make()->addMainLayout()->renderView('test', ['title' => "test"]);
        });

        Route::get('/', [HomeController::class, 'index']);

        Route::get('/signIn', [AuthController::class, 'showSignIn']);
        Route::get('/signUp', [AuthController::class, 'showSignUp']);

        Route::post('/signIn', [AuthController::class, 'signIn']);
        Route::post('/signUp', [AuthController::class, 'signUp']);
        Route::post('/logout', [AuthController::class, 'logout']);

        Route::get('/dashboard/downloads', [UserController::class, 'showDownloads']);
        Route::get('/dashboard/uploads', [UserController::class, 'showUploads']);
        Route::get('/dashboard/requests', [AdminController::class, 'showRequests']);
        Route::get('/dashboard/users', [AdminController::class, 'showUsers']);
        Route::get('/dashboard/settings', [AdminController::class, 'showSettings']);
        Route::get('/dashboard/profile', [UserController::class, 'showProfile']);

        Route::post('/uploadFile', [UserController::class, 'upload']);
    }
}

?>

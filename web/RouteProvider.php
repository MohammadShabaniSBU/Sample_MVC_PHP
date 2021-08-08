<?php

namespace route;

use app\controller\UserController;
use app\core\Route;
use app\core\View;

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

        Route::get('/dashboard/files', [UserController::class, 'showFiles']);
        Route::get('/dashboard/profile', [UserController::class, 'showProfile']);
    }
}

?>

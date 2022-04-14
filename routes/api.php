<?php

use App\Http\Controllers\Api\Admin\AuthController as AdminAuthController;
use App\Http\Controllers\Api\User\AuthController as UserAuthController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Frontend\FrontendController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::prefix('v1')->group(function () {
    Route::get('/status', function() {
        return response()->json(['status' => 'OK']);
    });
    Route::get('/product', [FrontendController::class, 'product']) ;
});

// Route::prefix('auth')->middleware(['api'])->controller(AuthController::class)->group(function() {
//     Route::get('user','userProfile');
//     Route::post('login','login');
//     Route::post('register','register');
// });

// Route::post('/login', [LoginController::class, 'apiLogin']);

Route::group([
    'controller' => UserAuthController::class,
    'middleware' => ['api', 'forceJson'],
    'prefix' => 'user'
], function ($router) {
    Route::post('/login', 'login');
    Route::post('/register', 'register');
    Route::post('/logout', 'logout');
    Route::post('/refresh', 'refresh');
    Route::get('/user-profile', 'userProfile');    
});

// Route::controller(AdminAuthController::class)->middleware(['api', 'forceJson'])->prefix('admin')

Route::group([
    'controller' => AdminAuthController::class,
    'middleware' => ['api', 'forceJson'],
    'prefix' => 'admin'
], function() {
    Route::post('/login', 'login');
    Route::post('/refresh', 'refresh');
    Route::get('/user-profile', 'userProfile');
});

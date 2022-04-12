<?php

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::prefix('v1')->group(function () {
    Route::get('/status', function() {
        return response()->json(['status' => 'OK']);
    });
    Route::get('/product', [FrontendController::class, 'product']) ;
});

Route::prefix('user')->middleware(['auth'])->group(function() {
    Route::post('profile', function() {
        return 'Only authenticated user can access here !';
    });
});
Route::post('/login', [LoginController::class, 'apiLogin']);

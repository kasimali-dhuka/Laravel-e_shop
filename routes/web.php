<?php

use App\Http\Controllers\Admin\FrontendController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Frontend\CartController;
use App\Http\Controllers\Frontend\FrontendController as FrontendFrontendController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return redirect()->route('home');
// })->middleware(['auth']);

// Route::get('/', function () {
//     return redirect()->route('admin.dashboard');
// })->middleware(['isAdmin', 'auth']);

Route::controller(FrontendFrontendController::class)->name('frontend.')->group(function() {
    Route::get('/', 'index')->name('index');
    Route::get('/category/{slug?}/{product?}', 'category')->name('category');
});

/**
 * Cart Controllers Routes
 */
Route::middleware(['auth'])->group(function() {
    Route::resource('/cart', CartController::class);
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');




/**
 * ---------------- Routes for ADMIN PANEL ------------------------
 */
Route::middleware(['auth', 'isAdmin'])->name('admin.')->group(function () {
    Route::get('/dashboard', [FrontendController::class, 'index'])->name('dashboard');
    Route::resource('/categories', CategoryController::class);
    Route::resource('/products', ProductController::class);
});
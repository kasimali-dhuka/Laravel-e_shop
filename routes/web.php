<?php

use App\Http\Controllers\Admin\FrontendController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Frontend\CartController;
use App\Http\Controllers\Frontend\CheckoutController;
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

/**
 * Frontend Controllers routes
 */

Route::controller(FrontendFrontendController::class)->name('frontend.')->group(function() {
    Route::get('/', 'index')->name('index');
    // Route::get('/product', 'product')->name('product');
    Route::get('/category/{slug?}/{product?}', 'category')->name('category');
});

/**
 * Cart and Checkout Controller Routes
 */
Route::middleware(['auth'])->group(function() {
    Route::resource('/cart', CartController::class);
    Route::get('/checkout', [CheckoutController::class, 'index'])->name('checkout.index');
});


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');




/**
 * ---------------- Routes for ADMIN PANEL ------------------------
 */

Route::controller(LoginController::class)->name('admin')->group(function() {
    Route::get('admin/login', 'showAdminLogin');
    Route::post('admin/login', 'adminLogin')->name('.login');
});

Route::middleware(['auth:admin'])->name('admin.')->group(function () {
    Route::get('/dashboard', [FrontendController::class, 'index'])->name('dashboard');
    Route::resource('admin/categories', CategoryController::class);
    Route::resource('admin/products', ProductController::class);
});
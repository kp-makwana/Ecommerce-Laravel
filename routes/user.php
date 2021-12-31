<?php

use App\Http\Controllers\User\DashboardController;
use App\Http\Controllers\User\ProductController;
use App\Http\Controllers\User\UserController;
use App\Http\Controllers\WishListController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| user Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::middleware(['auth', 'userCheck'])->group(function () {
    Route::prefix('dashboard')->as('dashboard.')->group(function () {
        Route::get('/index', [DashboardController::class, 'index'])->name('index');
    });
    Route::prefix('profile')->as('profile.')->group(function () {
        Route::get('/index', [UserController::class, 'index'])->name('index');
        Route::get('/edit', [UserController::class, 'edit'])->name('edit');
        Route::post('/update', [UserController::class, 'update'])->name('update');
        Route::post('/checkPassword', [UserController::class, 'checkPassword'])->name('checkPassword');
        Route::post('/changePassword', [UserController::class, 'changePassword'])->name('changePassword');
    });
    Route::prefix('order')->as('order.')->group(function () {
        Route::get('/index', function () {
            return view('user.order');
        })->name('index');
    });
    Route::prefix('product')->as('product.')->group(function () {
        Route::get('/index', [ProductController::class, 'index'])->name('index');
        Route::get('/productDetail/{id}', [\App\Http\Controllers\ProductController::class, 'show'])->name('productDetail');
        Route::get('/addToCart/{id}', [ProductController::class, 'addToCart'])->name('addToCart');
        Route::get('/removeFromCart/{id}', [ProductController::class, 'removeFromCart'])->name('removeFromCart');
        Route::get('/buyNow/{id}', [ProductController::class, 'buyNow'])->name('buyNow');
    });
    Route::get('/viewCart', [ProductController::class, 'viewCart'])->name('viewCart');
    Route::prefix('wishlist')->as('wishlist.')->group(function () {
        Route::get('/index', function () {
            return view('user.myWishlist');
        })->name('index');
        Route::get('/addOrRemoveWishList/{id}', [WishListController::class, 'addOrRemoveWishList'])->name('addOrRemoveWishList');
    });
    Route::prefix('help')->as('help.')->group(function () {
        Route::get('/index', function () {
            return view('user.help-support');
        })->name('index');
    });
});

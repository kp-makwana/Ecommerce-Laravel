<?php

use App\Http\Controllers\AddressController;
//use App\Http\Controllers\AdminController;
use App\Http\Controllers\User\DashboardController;
use App\Http\Controllers\User\UserController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\UserController as GeustController;
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

Route::middleware('login')->group(function () {
    Route::get('/', [GeustController::class, 'showLogin'])->name('login');
    Route::get('/signup', [GeustController::class, 'showSignup'])->name('signup');

    Route::post('login', [GeustController::class, 'register'])->name('user.register');
    Route::post('/', [GeustController::class, 'login'])->name('submitLogin');

});

Route::post('getStates', [AddressController::class, 'fetchStates'])->name('fetchStates');
Route::post('getCities', [AddressController::class, 'fetchCities'])->name('fetchCities');
Route::middleware('auth')->group(function () {
    Route::prefix('user')->as('user.')->group(function () {
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
        Route::prefix('wishlist')->as('wishlist.')->group(function () {
            Route::get('/index', function () {
                return view('user.myWishlist');
            })->name('index');
        });
        Route::prefix('cart')->as('cart.')->group(function () {
            Route::get('/index', function () {
                return view('user.myCart');
            })->name('index');
        });
        Route::prefix('help')->as('help.')->group(function () {
            Route::get('/index', function () {
                return view('user.help-support');
            })->name('index');
        });
    });
    Route::get('/logout', [GeustController::class, 'logout'])->name('logout');
});
Route::get('/test', function (){
    return view('test');
});


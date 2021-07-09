<?php

use App\Http\Controllers\AddressController;
use App\Http\Controllers\UserController as GeustController;
use Illuminate\Support\Facades\Route;

//use App\Http\Controllers\AdminController;

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
    Route::get('/logout', [GeustController::class, 'logout'])->name('logout');
});
Route::get('/test', function () {
    return view('admin.offer-add');
});


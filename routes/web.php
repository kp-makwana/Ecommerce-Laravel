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
    Route::get('/forgetPassword', [GeustController::class, 'forgetPasswordPage'])->name('forgetPasswordPage');
    Route::get('/resetPassword', [GeustController::class, 'resetPassword'])->name('password.reset');

    Route::post('login', [GeustController::class, 'register'])->name('user.register');
    Route::post('/', [GeustController::class, 'login'])->name('submitLogin');
    Route::post('/forgetPassword', [GeustController::class, 'forgetPassword'])->name('forgetPassword');
    Route::post('/reset-password', [GeustController::class, 'passwordUpdate'])->name('password.update');

});

Route::post('getStates', [AddressController::class, 'fetchStates'])->name('fetchStates');
Route::post('getCities', [AddressController::class, 'fetchCities'])->name('fetchCities');

Route::post('/stateList/{id?}', [AddressController::class, 'stateList'])->name('cityList');
Route::post('/cityList', [AddressController::class, 'cityList'])->name('cityList');

Route::middleware('auth')->group(function () {
    Route::get('/logout', [GeustController::class, 'logout'])->name('logout');
});
Route::get('/test', function () {
    return view('test');
});


<?php

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


//Route::post('/getStates',[\App\Http\Controllers\AddressController::class, 'fetchStates'])->name('fetchStates');
//Route::post('/getCities',[\App\Http\Controllers\AddressController::class, 'fetchCities'])->name('fetchCities');


Route::get('/download',[\App\Http\Controllers\Admin\ProductController::class, 'pdfCreate']);

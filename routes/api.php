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

Route::post('/login',[\App\Http\Controllers\API\Auth\LoginController::class, 'login']);

Route::middleware('auth:sanctum')->group(function () {
    Route::get('/product',[\App\Http\Controllers\API\ProductController::class,'index']);

    Route::get('/logout',[\App\Http\Controllers\API\Auth\LoginController::class, 'logout']);
});

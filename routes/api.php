<?php

use App\Http\Controllers\API\ProductController;
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

Route::post('/login', [\App\Http\Controllers\API\Auth\LoginController::class, 'login']);

Route::middleware('auth:sanctum')->group(function () {
    Route::get('/userDetails', [\App\Http\Controllers\API\Auth\LoginController::class, 'userDetails']);
    Route::get('/logout', [\App\Http\Controllers\API\Auth\LoginController::class, 'logout']);

    Route::prefix('product')->as('product.')->group(function () {
        Route::get('/index', [ProductController::class, 'index']);
        Route::get('/details/{id}', [ProductController::class, 'details']);
        Route::get('addToCart/{id}', [ProductController::class, 'addToCart']);
        Route::get('checkInCart/{id}', [ProductController::class, 'CheckInCart']);

    });
    Route::get('offers/{id}', [ProductController::class, 'offers']);

    Route::get('/brand', [ProductController::class, 'brand']);
    Route::get('/category', [ProductController::class, 'category']);

});

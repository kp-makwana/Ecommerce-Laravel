<?php

use App\Http\Controllers\AddressController;
use App\Http\Controllers\API\CommonController;
use App\Http\Controllers\API\Auth\LoginController;
use App\Http\Controllers\API\ProductController;
use App\Http\Controllers\WishListController;
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

Route::post('/login', [LoginController::class, 'login']);
Route::post('/signup', [LoginController::class, 'signup']);

Route::middleware('auth:sanctum')->group(function () {
    Route::get('/userDetails', [LoginController::class, 'userDetails']);
    Route::get('/logout', [LoginController::class, 'logout']);
    Route::get('/checkAuth', [LoginController::class, 'checkAuth']);

    Route::prefix('product')->as('product.')->group(function () {
        Route::get('/index', [ProductController::class, 'index']);
        Route::get('/details/{id}', [ProductController::class, 'details']);
        Route::get('/addToCart/{id}', [ProductController::class, 'addToCart']);
        Route::get('/checkInCart/{id}', [ProductController::class, 'CheckInCart']);
        Route::get('/ProductReview/{id}', [ProductController::class, 'ProductReview']);

    });
    Route::get('offers/{id}', [ProductController::class, 'offers']);
    Route::prefix('cart')->as('cart.')->group(function () {
        Route::get('/cartList', [ProductController::class, 'cartList']);
        Route::get('/cartQuantityAdd/{id}', [ProductController::class, 'cartQuantityAdd'])->name('cartQuantityAdd');
        Route::get('/cartQuantityRemove/{id}', [ProductController::class, 'cartQuantityRemove'])->name('cartQuantityRemove');
        Route::get('/removeFromCart/{id}', [ProductController::class, 'removeFromCart']);
    });
    Route::get('cartList', [ProductController::class, 'cartList']);

    Route::prefix('wishlist')->as('wishlist.')->group(function () {
        Route::get('/index', [WishListController::class, 'index']);
        Route::get('/addOrRemoveWishList/{id}', [WishListController::class, 'addOrRemoveWishList']);
    });
    Route::prefix('user')->as('user.')->group(function () {
        Route::get('/profile', [LoginController::class, 'userDetails']);
        Route::post('/profileUpdate', [LoginController::class, 'userUpdate']);
        Route::post('/checkPassword', [LoginController::class, 'checkPassword']);
        Route::post('/changePassword', [LoginController::class, 'changePassword']);
    });

    Route::get('fetchCountry', [CommonController::class, 'fetchCountry'])->name('fetchCountry');
    Route::get('getStates', [CommonController::class, 'fetchStates'])->name('fetchStates');
    Route::get('getCities', [CommonController::class, 'fetchCities'])->name('fetchCities');
    Route::get('/brand', [ProductController::class, 'brand']);
    Route::get('/category', [ProductController::class, 'category']);

});

Route::get('/test', [ProductController::class, 'index']);
Route::get('/users', function () {
    return response()->json(\App\Models\User::all());
});
Route::get('/users/{id}', function ($id) {
    return response()->json(\App\Models\User::find($id));
});

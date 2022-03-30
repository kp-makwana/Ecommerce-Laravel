<?php

use App\Http\Controllers\PaymentController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\User\AddressController;
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
    Route::prefix('address')->as('address.')->group(function () {
        Route::get('/index', [AddressController::class, 'index'])->name('index');
        Route::get('/add', [AddressController::class, 'add'])->name('add');
        Route::get('/edit/{id}', [AddressController::class, 'edit'])->name('edit');
        Route::post('/addOrEdit', [AddressController::class, 'addOrEdit'])->name('addOrEdit');
        Route::post('/delete', [AddressController::class, 'delete'])->name('delete');
        Route::post('/defaultAddressChange', [AddressController::class, 'defaultSet'])->name('defaultSet');
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
    Route::prefix('cart')->as('cart.')->group(function () {
        Route::get('/index', [ProductController::class, 'viewCart'])->name('index');
        Route::get('/cartQuantityAdd/{id}', [ProductController::class, 'cartQuantityAdd'])->name('cartQuantityAdd');
        Route::get('/cartQuantityRemove/{id}', [ProductController::class, 'cartQuantityRemove'])->name('cartQuantityRemove');
        Route::get('/address', [ProductController::class, 'address'])->name('address')->middleware('cart');
        Route::get('/placeOrder', [ProductController::class, 'placeOrder'])->name('placeOrder')->middleware('cart');
    });
    Route::prefix('order')->as('order.')->group(function () {
        Route::get('/payment', [OrderController::class, 'payment'])->name('payment')->middleware('cart');
        Route::get('/placeOrder', [OrderController::class, 'placeOrder'])->name('placeOrder')->middleware('cart');
    });

    Route::prefix('wishlist')->as('wishlist.')->group(function () {
        Route::get('/index', [WishListController::class, 'index'])->name('index');
        Route::get('/addOrRemoveWishList/{id}', [WishListController::class, 'addOrRemoveWishList'])->name('addOrRemoveWishList');
        Route::get('/removeToWishList/{id}', [WishListController::class, 'removeToWishList'])->name('removeToWishList');
    });
    Route::prefix('help')->as('help.')->group(function () {
        Route::get('/index', function () {
            return view('user.help-support');
        })->name('index');
    });
    Route::post('/checkout', [PaymentController::class, 'checkout'])->name('checkout');
});

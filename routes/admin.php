<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\BrandController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ProductController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| admin Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::middleware('auth')->group(function () {
    Route::get('/dashboard', [AdminController::class, 'index'])->name('index');
    Route::get('/logout', [AdminController::class, 'logout'])->name('logout');
    Route::prefix('product')->as('product.')->group(function () {
        Route::get('/index', [ProductController::class, 'index'])->name('index');
        Route::get('/add', [ProductController::class, 'add'])->name('add');
        Route::post('/save_update/{id?}', [ProductController::class, 'save_update'])->name('save');
        Route::get('/productDetail/{id}', [ProductController::class, 'show'])->name('productDetail');
        Route::get('/edit/{id}', [ProductController::class, 'edit'])->name('edit');
        Route::prefix('offer')->as('offer.')->group(function (){
            Route::post('/offer_add_update/{id?}',[ProductController::class,'offer_add_update'])->name('offer_add_update');
            Route::post('/delete/{id}',[ProductController::class,'delete_offer'])->name('delete');
        });
        Route::post('/delete_img',[ProductController::class,'delete_images'])->name('delete_img');
    });
    Route::prefix('category')->as('category.')->group(function () {
        Route::get('/index', [CategoryController::class, 'index'])->name('index');
        Route::get('/add', [CategoryController::class, 'add'])->name('add');
    });
    Route::prefix('brand')->as('brand.')->group(function () {
        Route::get('/index', [BrandController::class, 'index'])->name('index');
        Route::get('/add', [BrandController::class, 'add'])->name('add');
    });
});

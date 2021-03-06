<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\BrandController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\UserController;
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

Route::middleware(['auth','adminCheck'])->group(function () {
    Route::get('/dashboard', [AdminController::class, 'index'])->name('index');
    Route::get('/logout', [AdminController::class, 'logout'])->name('logout');
    Route::prefix('product')->as('product.')->group(function () {
        Route::get('gridView', [ProductController::class, 'gridView'])->name('gridView');
        Route::get('/listview', [ProductController::class, 'listview'])->name('listview');
        Route::get('/add', [ProductController::class, 'add'])->name('add');
        Route::post('/save_update/{id?}', [ProductController::class, 'save_update'])->name('save');
        Route::get('/productDetail/{id}', [ProductController::class, 'show'])->name('productDetail');
        Route::get('/edit/{id}', [ProductController::class, 'edit'])->name('edit');
        Route::get('/bulk_product_upload', [ProductController::class, 'bulkProductUpload'])->name('bulk_product_upload');
        Route::post('/delete', [ProductController::class, 'delete_product'])->name('delete');
        Route::get('/deleted', [ProductController::class, 'deleted_Product'])->name('deleted');
        Route::prefix('offer')->as('offer.')->group(function () {
            Route::post('/offer_add_update/{id?}', [ProductController::class, 'offer_add_update'])->name('offer_add_update');
            Route::post('/delete/{id}', [ProductController::class, 'delete_offer'])->name('delete');
        });
        Route::post('/delete_img', [ProductController::class, 'delete_images'])->name('delete_img');

        // Product Import & Export
        Route::get('/demoSheetDownload', [\App\Http\Controllers\Admin\ProductController::class, 'demoSheetDownload'])->name('demoSheetDownload');
        Route::post('/productStockUpdate', [\App\Http\Controllers\Admin\ProductController::class, 'productStockUpdate'])->name('productStockUpdate');
    });
    Route::prefix('category')->as('category.')->group(function () {
        Route::get('/index', [CategoryController::class, 'index'])->name('index');
        Route::get('/add', [CategoryController::class, 'add'])->name('add');
    });
    Route::prefix('brand')->as('brand.')->group(function () {
        Route::get('/index', [BrandController::class, 'index'])->name('index');
        Route::get('/add', [BrandController::class, 'add'])->name('add');
    });
    Route::prefix('user')->as('user.')->group(function () {
        Route::get('/index', [UserController::class, 'index'])->name('index');
    });
});

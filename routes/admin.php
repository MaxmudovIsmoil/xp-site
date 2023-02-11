<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\ProductCategoryController;
use App\Http\Controllers\Admin\AboutController;
use App\Http\Controllers\Admin\ContactController;
use App\Http\Controllers\Admin\PartnerController;
use App\Http\Controllers\Admin\DriverController;
use App\Http\Controllers\Admin\CertificateController;
use App\Http\Controllers\Admin\NewController;
use App\Http\Controllers\Admin\CarouselController;


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


Route::get('/dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');

Route::group(['prefix' => 'certificate'], function() {
    Route::get('/', [CertificateController::class, 'index'])->name('certificate.index');
    Route::put('/{certificate}', [CertificateController::class, 'update'])->name('certificate.update');
    Route::post('/file-upload', [CertificateController::class, 'file_upload'])->name('certificate.file_upload');
    Route::delete('/{id}', [CertificateController::class, 'file_delete'])->name('certificate.file_delete');
    Route::put('/file-name/{id}', [CertificateController::class, 'file_name_update'])->name('certificate.file_name');
});


Route::group(['prefix' => '/'], function() {
    Route::resource('/new', NewController::class)->except(['create', 'edit', 'show']);
    Route::get('/new/one/{id}', [NewController::class, 'getOne'])->name('new.getOne');
});


Route::group(['prefix' => 'about'], function() {
    Route::get('/', [AboutController::class, 'index'])->name('about.index');
    Route::put('/{about}', [AboutController::class, 'update'])->name('about.update');
    Route::post('/file-upload', [AboutController::class, 'file_upload'])->name('about.file_upload');
    Route::delete('/{id}', [AboutController::class, 'file_delete'])->name('about.file_delete');
});


Route::resource('/carousel', CarouselController::class)->except(['create', 'edit', 'show']);


Route::group(['prefix'  => '/'], function() {
    Route::resource('/product-category', ProductCategoryController::class)->except(['create', 'edit', 'show']);
    Route::get('/product-category/one/{id}', [ProductCategoryController::class, 'getOne'])->name('product-category.getOne');
});


Route::group(['prefix'  => '/'], function() {
    Route::resource('/product', ProductController::class)->except(['create', 'edit', 'show', 'destroy']);
    Route::get('/product/one/{id}', [ProductController::class, 'getOne'])->name('product.getOne');
});


// // Order Detail
// Route::group(['prefix'  => '/order-detail'], function() {
//     Route::get('/{id}', [OrderDetailController::class, 'index'])->name('order_detail');
//     Route::post('/store', [OrderDetailController::class, 'store'])->name('order_detail.store');
//     Route::get('/one/{id}', [OrderDetailController::class, 'getOne'])->name('order_detail.getOne');
//     Route::put('/{user_instance}', [OrderDetailController::class, 'update'])->name('order_detail.update');
//     Route::delete('/{user_instance}', [OrderDetailController::class, 'destroy'])->name('order_detail.destroy');
// });


// // Category
// Route::group(['prefix' => '/'], function() {
//     Route::resource('/category', CategoryController::class)->except(['create', 'edit', 'show']);
//     Route::get('/category/one/{id}', [CategoryController::class, 'getOne'])->name('category.getOne');
// });


// // Contact
// Route::group(['prefix' => '/'], function() {
//     Route::resource('/contact', ContactController::class)->except(['create', 'edit']);
//     Route::get('/contact/one/{id}', [ContactController::class, 'getOne'])->name('contact.getOne');
// });

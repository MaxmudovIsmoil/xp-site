<?php

use App\Http\Controllers\Admin\AboutController;
use App\Http\Controllers\Admin\BannerController;
use App\Http\Controllers\Admin\CarouselController;
use App\Http\Controllers\Admin\CertificateController;
use App\Http\Controllers\Admin\ContactController;
use App\Http\Controllers\Admin\NewController;
use App\Http\Controllers\Admin\Product\ProductCategoryController;
use App\Http\Controllers\Admin\Product\ProductController;
use App\Http\Controllers\Admin\Product\ProductPhotoController;
use Illuminate\Support\Facades\Route;


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


Route::get('/dashboard', function() {
    return view('admin.dashboard');
})->name('admin.dashboard');

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
    Route::post('/image-upload', [AboutController::class, 'image_upload'])->name('about.image_upload');
    Route::delete('/{id}', [AboutController::class, 'file_delete'])->name('about.file_delete');
});


Route::resource('/carousel', CarouselController::class)->except(['create', 'edit', 'show']);


Route::group(['prefix'  => 'banner'], function() {
    Route::get('/', [BannerController::class, 'index'])->name('banner');
    Route::post('/update', [BannerController::class, 'update'])->name('banner.update');
});


Route::group(['prefix'  => 'product-category'], function() {
    Route::get('/', [ProductCategoryController::class, 'index'])->name('product_category.index');
    Route::post('/store', [ProductCategoryController::class, 'store'])->name('product_category.store');
    Route::put('/update/{cat_id}', [ProductCategoryController::class, 'update'])->name('product_category.update');
    Route::delete('/{cat_id}', [ProductCategoryController::class, 'destroy'])->name('product_category.destroy');
    Route::get('/one/{id}', [ProductCategoryController::class, 'getOne'])->name('product_category.getOne');
});


Route::group(['prefix'  => 'product'], function() {
    Route::get('/{id}', [ProductController::class, 'index'])->name('product.index');
    Route::get('/{id}/create', [ProductController::class, 'create'])->name('product.create');
    Route::post('/store', [ProductController::class, 'store'])->name('product.store');
    Route::get('{category_id}/edit/{product_id}', [ProductController::class, 'edit'])->name('product.edit');
    Route::put('/update/{product_id}', [ProductController::class, 'update'])->name('product.update');
    Route::delete('/{product_id}', [ProductController::class, 'destroy'])->name('product.destroy');

    Route::post('/upload/{$id}', [ProductPhotoController::class, 'upload'])->name('product_photo.upload');
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


// Contact
Route::group(['prefix' => '/contact'], function() {
    Route::get('/', [ContactController::class, 'index'])->name( 'contact.index');
    Route::put('/edit/{id}', [ContactController::class, 'edit'])->name('contact.edit');
    Route::put('/update/{id}', [ContactController::class, 'update'])->name('contact.update');
    Route::get('/one/', [ContactController::class, 'one'])->name('contact.getOne');
    Route::put('/file_upload/{id}', [ContactController::class, 'file_upload'])->name('contact.file_upload');
});

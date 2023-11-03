<?php

use App\Http\Controllers\Admin\AboutController;
use App\Http\Controllers\Admin\BannerController;
use App\Http\Controllers\Admin\CarouselController;
use App\Http\Controllers\Admin\CertificateController;
use App\Http\Controllers\Admin\ContactController;
use App\Http\Controllers\Admin\NewController;
use App\Http\Controllers\Admin\ServiceController;
use App\Http\Controllers\Admin\DriverController;
use App\Http\Controllers\Admin\Product\ProductCategoryController;
use App\Http\Controllers\Admin\Product\ProductController;
use App\Http\Controllers\Admin\Product\ProductPhotoController;
use App\Http\Controllers\Admin\Product\ProductAdditionController;
use App\Http\Controllers\Admin\Product\ProductOverviewController;
use App\Http\Controllers\Admin\Product\ProductSpecificationController;
use App\Http\Controllers\Admin\Product\ProductServiceSupportController;
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
})->name('dashboard');

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


Route::group(['prefix' => '/'], function() {
    Route::resource('/service', ServiceController::class)->except(['create', 'edit', 'show']);
    Route::get('/service/one/{id}', [ServiceController::class, 'getOne'])->name('service.getOne');
});

Route::group(['prefix' => '/'], function() {
    Route::resource('/driver', DriverController::class)->except(['create', 'edit', 'show']);
    Route::get('/driver/one/{id}', [DriverController::class, 'getOne'])->name('driver.getOne');
});

// About
Route::group(['prefix' => 'about'], function() {
    Route::get('/', [AboutController::class, 'index'])->name('about.index');
    Route::put('/{about}', [AboutController::class, 'update'])->name('about.update');
    Route::post('/file-upload', [AboutController::class, 'file_upload'])->name('about.file_upload');
    Route::post('/image-upload', [AboutController::class, 'image_upload'])->name('about.image_upload');
    Route::delete('/{id}', [AboutController::class, 'file_delete'])->name('about.file_delete');
});


Route::resource('/carousel', CarouselController::class)->except(['create', 'edit', 'show']);

// Banner
Route::group(['prefix'  => 'banner'], function() {
    Route::get('/', [BannerController::class, 'index'])->name('banner');
    Route::post('/update', [BannerController::class, 'update'])->name('banner.update');
});

// Product Category
Route::group(['prefix'  => 'product-category'], function() {
    Route::get('/', [ProductCategoryController::class, 'index'])->name('product_category.index');
    Route::post('/store', [ProductCategoryController::class, 'store'])->name('product_category.store');
    Route::put('/update/{cat_id}', [ProductCategoryController::class, 'update'])->name('product_category.update');
    Route::delete('/{cat_id}', [ProductCategoryController::class, 'destroy'])->name('product_category.destroy');
    Route::get('/one/{id}', [ProductCategoryController::class, 'getOne'])->name('product_category.getOne');
});

// Product
Route::group(['prefix'  => 'product'], function() {
    Route::get('/{id}', [ProductController::class, 'index'])->name('product.index');
    Route::get('/{id}/create', [ProductController::class, 'create'])->name('product.create');
    Route::post('/store', [ProductController::class, 'store'])->name('product.store');
    Route::get('{category_id}/edit/{product_id}', [ProductController::class, 'edit'])->name('product.edit');
    Route::put('/update/{product_id}', [ProductController::class, 'update'])->name('product.update');
    Route::delete('/{product_id}', [ProductController::class, 'destroy'])->name('product.destroy');


    Route::get('/addition/{id}', [ProductAdditionController::class, 'index'])->name('product.addition');
    Route::post('/photo/upload/{id}', [ProductPhotoController::class, 'upload'])->name('product_photo.upload');
    Route::delete('/photo/destroy/{id}', [ProductPhotoController::class, 'destroy'])->name('product_photo.destroy');

    // overviews
    Route::group(['prefix'  => 'overview'], function() {
        Route::post('/store', [ProductOverviewController::class, 'store'])->name('product_overview.store');
        Route::post('/one/{id}', [ProductOverviewController::class, 'one'])->name('product_overview.one');
        Route::post('/update/{id}', [ProductOverviewController::class, 'update'])->name('product_overview.update');
        Route::delete('/delete/{id}', [ProductOverviewController::class, 'destroy'])->name('product_overview.destroy');
    });

    // Specification
    Route::group(['prefix'  => 'specification'], function() {
        Route::post('/store', [ProductSpecificationController::class, 'store'])->name('product_specification.store');
        Route::post('/update/{id}', [ProductSpecificationController::class, 'update'])->name('product_specification.update');
        Route::delete('/delete/{id}', [ProductSpecificationController::class, 'destroy'])->name('product_specification.destroy');
    });

    // Service and Support
    Route::group(['prefix'  => 'service-support'], function() {
        Route::post('/store', [ProductServiceSupportController::class, 'store'])->name('product_service_support.store');
        Route::post('/one/{id}', [ProductServiceSupportController::class, 'one'])->name('product_service_support.one');
        Route::post('/update/{id}', [ProductServiceSupportController::class, 'update'])->name('product_service_support.update');
        Route::delete('/delete/{id}', [ProductServiceSupportController::class, 'destroy'])->name('product_service_support.destroy');
    });
});


// Contact
Route::group(['prefix' => '/contact'], function() {
    Route::get('/', [ContactController::class, 'index'])->name( 'contact.index');
    Route::put('/edit/{id}', [ContactController::class, 'edit'])->name('contact.edit');
    Route::put('/update/{id}', [ContactController::class, 'update'])->name('contact.update');
    Route::get('/one/', [ContactController::class, 'one'])->name('contact.getOne');
    Route::put('/file_upload/{id}', [ContactController::class, 'file_upload'])->name('contact.file_upload');
});

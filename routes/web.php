<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\NewController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProductDetailController;
use App\Http\Controllers\DriverController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\LanguageController;



// Frontend
Route::get('/', [HomeController::class, 'index']);

Route::get('index/{locale?}', [HomeController::class, 'index'])->name('index');


Route::get('news/{locale?}', [NewController::class, 'index'])->name('news');
Route::get('new/one/{locale?}/{id}', [NewController::class, 'one'])->name('new_one');


Route::get('about/{locale?}', [AboutController::class, 'index'])->name('about');


Route::get('product/{locale?}', [ProductController::class, 'index'])->name('product');
Route::get('product/one/{locale?}/{id}', [ProductController::class, 'one'])->name('product.one');


Route::get('product-detail/{id}', [ProductDetailController::class, 'index'])->name('product-detail');


Route::get('contact/{locale?}', [ContactController::class, 'index'])->name('contact');


Route::get('drivers/{locale?}', [DriverController::class, 'index'])->name('driver');


Route::get('locale/{locale}', [LanguageController::class, 'change_locale'])->name('locale');


// Backend
Route::get('login', function () {
    return view('admin.login');
});
Route::post('login', [AuthController::class, 'login'])->name('login');
Route::post('logout', [AuthController::class, 'logout'])->name('logout');



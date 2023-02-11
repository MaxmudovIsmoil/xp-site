<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LanguageController;


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

// Frontend
Route::get('/', [HomeController::class, 'index']);

Route::get('index/{locale?}', [HomeController::class, 'index'])->name('index');


Route::get('about/{locale?}', [AboutController::class, 'index'])->name('about');


Route::get('news/{locale?}', [HomeController::class, 'news'])->name('news');


Route::get('product/{locale?}', [HomeController::class, 'product'])->name('product');


Route::get('product-detail/{locale?}', [HomeController::class, 'product_detail'])->name('product-detail');


Route::get('contact/{locale?}', [HomeController::class, 'contact'])->name('contact');


Route::get('drivers/{locale?}', [HomeController::class, 'drivers'])->name('drivers');




Route::get('locale/{locale}', [LanguageController::class, 'change_locale'])->name('locale');




// Backend
Route::get('login', [AuthController::class, 'showLoginForm']);
Route::post('login', [AuthController::class, 'login'])->name('login');
Route::post('logout', [AuthController::class, 'logout'])->name('logout');



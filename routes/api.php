<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\CertificateController;
use App\Http\Controllers\Api\ProductController;
use App\Http\Controllers\Api\NewController;
use App\Http\Controllers\Api\AboutController;
use App\Http\Controllers\Api\CarouselApiController;


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


Route::get('/carousel', [CarouselApiController::class, 'index']);

Route::get('/certificate/{locale?}', [CertificateController::class, 'index']);

Route::get('/news/{locale?}', [NewController::class, 'index']);

Route::get('/about/{locale?}', [AboutController::class, 'index']);



// Public
// Route::post('/register', [AuthController::class, 'register']);
// Route::post('/login', [AuthController::class, 'login']);

// Protected
// Route::group(['middleware' => 'auth:sanctum'], function () {

// products
// Route::apiResource('products', ProductController::class);

// Categories
// Route::apiResource('categories', CategoryController::class);

// Route::post('/logout', [AuthController::class, 'logout']);

// });


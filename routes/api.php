<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\V1\Student\AuthController;
use App\Http\Controllers\Api\V1\Guest\HomeController;
use App\Http\Controllers\Api\V1\ApiFrontendController;
use App\Http\Controllers\Api\V1\Guest\CourseController;
use App\Http\Controllers\Api\V1\Student\CartController;
use App\Http\Controllers\Api\V1\Student\AboutController;
use App\Http\Controllers\Api\V1\Student\CheckoutController;
use App\Http\Controllers\Api\V1\Student\DashboardController;

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

Route::post('/register', [AuthController::class, 'signUpPost']);
Route::post('/login', [AuthController::class, 'signInPost']);

Route::middleware('auth:sanctum')->group( function () {
    Route::get('/user', [AuthController::class, 'user']);
});

Route::prefix("v1")->middleware('auth:sanctum')->group(function(){

    Route::controller(CartController::class)->group(function () { //->prefix('v1'->middleware('auth:sanctum')
        Route::get('/carts',                                        'index')->name('cart.api.list');
        Route::post('/cart/store',                                  'store')->name('cart.api.store');
        Route::post('/cart/destroy',                                'destroy')->name('cart.api.delete');
    });
    
    Route::controller(CheckoutController::class)->group(function () { //->prefix('v1')->middleware('auth:sanctum')
        Route::post('/carts/checkout',                               'checkout')->name('cart.api.checkout');
    });
    
    Route::controller(AboutController::class)->group(function () { //->prefix('v1')->middleware('auth:sanctum')
        Route::get('/about-us',                                        'index')->name('page.api.about');
    });
    
});
//  start home api


//  end home api




include_route_files(__DIR__ . '/ajax/');
include_route_files(__DIR__ . '/api/');

<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\ShopController;
use App\Http\Controllers\Api\CategoryController;
use App\Http\Controllers\Api\ProductController;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group(['prefix' => 'v1'], function () { 
    // Route::POST('/signin', [AuthController::class, 'signin']);
    // Route::POST('/signup', [AuthController::class, 'signup']);

    // Route::GET('/shop', [HomeController::class, 'shop']);
    // Route::GET('/category', [HomeController::class, 'category']);

    Route::middleware('auth:sanctum')->group(function() {

        Route::apiResource('/shops', ShopController::class);
        Route::apiResource('/categories', CategoryController::class);
        Route::apiResource('/products', ProductController::class);
       
    });
    
});

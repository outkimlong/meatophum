<?php

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();
Route::resource('home', App\Http\Controllers\HomeController::class);
Route::resource('users', App\Http\Controllers\Auth\UserController::class);
Route::resource('shops', App\Http\Controllers\Frontend\ShopController::class);
Route::resource('categories', App\Http\Controllers\Frontend\CategoryController::class);
Route::resource('products', App\Http\Controllers\Frontend\ProductController::class);

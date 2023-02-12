<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\client\HomeController;
use App\Http\Controllers\client\ProductDetailController;
use App\Http\Controllers\client\ShopController;

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
//Client

Route::get('/', function () {
    return view('/client/home');
});
Route::get('', [HomeController::class, "index"])->name('index-product');
Route::get('/products/product_id/{id}', [ProductDetailController::class, "index"])->name('index-detail-product');
Route::get('/shop', [ShopController::class, "index"])->name('index-shop-product');


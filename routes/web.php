<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\client\HomeController;
use App\Http\Controllers\client\ProductDetailController;
use App\Http\Controllers\client\ShopController;
use App\Http\Controllers\client\CartController;


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
Route::get('/shop', [ShopController::class, "index"])->name('/shop');
Route::get('/products/add_to_cart/{id}', [ShopController::class, "addToCart"])->name('addToCart');

Route::group(['prefix' => 'cart'], function(){
    Route::get('add/{id}', [CartController::class, 'add'])->name('cart.add');
    Route::get('remove/{id}', [CartController::class, 'remove'])->name('cart.remove');
    Route::get('update/{id}/{quantity}', [CartController::class, 'update'])->name('cart.update');
    Route::get('clear', [CartController::class, 'clear'])->name('cart.clear');
});



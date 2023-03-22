<?php

namespace App\Http\Controllers\client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Helper\CartHelper;
use App\Models\Product;
use App\Session;

class CartController extends Controller
{
    public function add(CartHelper $cart, $id){
        // $product = Product::find($id);

        // $cart->add($product);
        dd(session('cart'));
    }
}

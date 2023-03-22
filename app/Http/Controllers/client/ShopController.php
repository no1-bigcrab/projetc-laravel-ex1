<?php

namespace App\Http\Controllers\client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;
use Session;
use App\Cart;

class ShopController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        $products = Product::paginate(9);
        return view('/client/shop', compact('categories', 'products'));
    }
}

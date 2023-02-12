<?php

namespace App\Http\Controllers\client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;

class ProductDetailController extends Controller
{
    public function index()
    {
        $id = request('id');
        $product = Product::find($id);
        $categories = Category::all()->load('product', 'sub_category');

        return view('client/detail', compact('product', 'categories'));
    }
}

<?php

namespace App\Http\Controllers\client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use App\Models\ProductsSubcategory;


class HomeController extends Controller
{
    public function index()
    {
        $categories = Category::all()->load('product', 'sub_category');
        $trendyProduct = Product::all()->load('category');
        $newProduct = Product::latest()->limit(8);

        $vendor=[];

        return view('client/home', 
                    compact(
                        'categories', 
                        'trendyProduct', 
                        'newProduct'
                    ));
    }
}

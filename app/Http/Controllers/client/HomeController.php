<?php

namespace App\Http\Controllers\client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use App\Models\ProductsSubcategory;
use App\Models\Vendor;


class HomeController extends Controller
{
    public function index()
    {
        $categories = Category::all()->load('product', 'sub_category');
        $trendyProduct = Product::all()->load('category', 'images');//trendy
        $newProduct = Product::latest()->limit(8)->get();//new products
        $mostViewProduct = Product::all();//co luot view nhieu nhat
        $vendors = Vendor::all();

        return view('client/home', 
                    compact(
                        'categories', 
                        'trendyProduct', 
                        'newProduct',
                        'vendors'
                    ));
    }
}

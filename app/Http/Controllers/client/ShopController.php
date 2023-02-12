<?php

namespace App\Http\Controllers\client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;

class ShopController extends Controller
{
    public function index()
    {
        $categories= Category::all();
        return view('/client/shop', compact('categories'));
    }
}

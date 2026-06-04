<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category; 


class ProductController extends Controller
{
    public function index()
    {
        // 1. Latest 8 products database se nikalein
        $products = Product::latest()->take(8)->get();

        // 2. Saari categories bhi database se nikalein
        $categories = Category::all();

        // 3. Dono variables ko 'Home' blade view mein bhej dein
        return view('Home', compact('products', 'categories'));
    }
}

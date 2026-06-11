<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;


class ProductController extends Controller
{
    public function index()
    {
        $products = Product::latest()->take(8)->get();
        $categories = Category::all();
        return view('Home', compact('products', 'categories'));
    }

public function allCategories()
{
    $categories = Category::all();
    return view('categories', compact('categories'));
}


public function allProducts($category_id = null)
{
    $categories = Category::all();

    // 1. Base Query shuru kien (get() abhi nahi lagana)
    $query = Product::query();

    // 2. Agar category filter lagaya hua hy
    if ($category_id) {
        $query->where('category_id', $category_id);
    }

    // 3. DYNAMIC SORTING (Yahan dropdown handle ho raha hy)
    $sort = request('sort'); // URL se ?sort= uthayega

    if ($sort == 'price_low') {
        $query->orderBy('price', 'asc'); // Sasta pehle
    } elseif ($sort == 'price_high') {
        $query->orderBy('price', 'desc'); // Mehenga pehle
    } else {
        $query->latest(); // Default: Naye products pehle (Latest)
    }

    // 4. Aakhri mein data fetch kiya
    $products = $query->get();

    return view('products', compact('products', 'categories', 'category_id'));
}


public function productsByTag($tag_name)
{
    $categories = Category::all();
    $products = Product::where('tag', $tag_name)->latest()->get();
    $category_id = null;

    return view('products', compact('products', 'categories', 'category_id', 'tag_name'));
}
}

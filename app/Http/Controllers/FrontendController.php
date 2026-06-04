<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;


class FrontendController extends Controller
{
    public function index()
    {
        // Database se categories aur featured products uthana
        $categories = Category::take(4)->get(); // Jo pehli 4 categories shop by category mein dikhani hain
        $featuredProducts = Product::where('is_featured', true)->latest()->take(5)->get(); // Naye design k mutabiq 5 products ka grid

        // Data ko home view (.blade.php) par bhejna
        return view('home', compact('categories', 'featuredProducts'));
    }
}

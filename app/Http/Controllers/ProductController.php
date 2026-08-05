<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;

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
        return view('categories');
    }

    public function allProducts(Request $request, $category_id = null)
    {
        $query = Product::query();

        // From route parameter or request input
        $categoryId = $request->input('category_id', $category_id);
        if ($categoryId) {
            $query->where('category_id', $categoryId);
        }

        if ($request->filled('tag')) {
            $query->where('tag', $request->input('tag'));
        }

        // Search Logic Updated (Name aur Description dono ke liye)
        if ($request->filled('search')) {
            $search = $request->input('search');
            $query->where(function($q) use ($search) {
                $q->where('name', 'like', '%' . $search . '%')
                  ->orWhere('description', 'like', '%' . $search . '%');
            });
        }

        $sort = $request->input('sort');
        if ($sort == 'price_low') {
            $query->orderBy('price', 'asc');
        } elseif ($sort == 'price_high') {
            $query->orderBy('price', 'desc');
        } else {
            $query->latest();
        }

        $products = $query->get();

        if ($request->ajax()) {
            return response()->json([
                'html' => view('partials.product_grid', compact('products'))->render(),
                'count' => $products->count()
            ]);
        }

        $tag_name = $request->input('tag');
        // $categories hata kar compact se nikaal diya hai
        return view('products', compact('products', 'category_id', 'tag_name'));
    }

    public function searchSuggestions(Request $request)
    {
        $search = $request->input('search');
        
        if (empty($search)) {
            return response()->json([]);
        }

        $products = Product::where('name', 'like', '%' . $search . '%')
            ->orWhere('description', 'like', '%' . $search . '%')
            ->latest()
            ->take(5) // Max 5 suggestions dikhane k liye
            ->get();

        // Data format karna ta k image path sahi handle ho sake
        $formattedProducts = $products->map(function ($product) {
            // Image array path check
            $img = $product->image;
            if (is_array($img) && count($img) > 0) {
                $img = $img[0];
            } elseif (is_string($img)) {
                $decoded = json_decode($img, true);
                $img = is_array($decoded) && count($decoded) > 0 ? $decoded[0] : $img;
            }

            return [
                'id' => $product->id,
                'name' => $product->name,
                'slug' => $product->slug,
                'price' => $product->price,
                'image_url' => $img ? asset('storage/' . $img) : 'https://images.unsplash.com/photo-1591047139829-d91aecb6caea?auto=format&fit=crop&q=80&w=500'
            ];
        });

        return response()->json($formattedProducts);
    }

    public function productsByTag(Request $request, $tag_name)
    {
        $request->merge(['tag' => $tag_name]);
        return $this->allProducts($request);
    }

    public function show($slug)
    {
        $product = Product::with('category')->where('slug', $slug)->firstOrFail();

        $relatedProducts = Product::where('category_id', $product->category_id)
            ->where('id', '!=', $product->id)
            ->take(8)
            ->get();

        if ($relatedProducts->isEmpty()) {
            $relatedProducts = Product::where('id', '!=', $product->id)
                ->inRandomOrder()
                ->take(8)
                ->get();
        }

        return view('product-details', compact('product', 'relatedProducts'));
    }
}
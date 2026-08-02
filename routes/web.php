<?php


use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CartController;
use App\Http\Controllers\ContactController;
Route::get('/', function () {
    return view('welcome');
});

Route::get('/', [ProductController::class, 'index'])->name('home');
Route::get('/categories', [ProductController::class, 'allCategories']);
Route::get('/all-products/tag/{tag_name}', [ProductController::class, 'productsByTag'])->name('products.tag');
Route::get('/all-products/{category_id?}', [ProductController::class, 'allProducts'])->name('products.all');

Route::get('/cart/add/{id}', [CartController::class, 'add'])->name('cart.add');
Route::view('/about-us', 'about');
Route::view('/contact-us', 'contact');
Route::get('/contact-us', [ContactController::class, 'show'])->name('contact.show');
Route::post('/contact-us', [ContactController::class, 'submit'])->name('contact.submit');
// Cart page dekhne klye route
Route::get('/cart', [CartController::class, 'index'])->name('cart.index');

Route::patch('/cart/update', [CartController::class, 'update'])->name('cart.update');
Route::get('/product/{slug}', [ProductController::class, 'show'])->name('product.show');




Route::get('/api/search-suggestions', [ProductController::class, 'searchSuggestions']);
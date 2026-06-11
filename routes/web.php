<?php


use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/', [ProductController::class, 'index'])->name('home');
Route::get('/categories', [ProductController::class, 'allCategories']);
// Category wale route ke bilkul neeche yeh likhein:
Route::get('/all-products/tag/{tag_name}', [ProductController::class, 'productsByTag'])->name('products.tag');
Route::get('/all-products/{category_id?}', [ProductController::class, 'allProducts'])->name('products.all');


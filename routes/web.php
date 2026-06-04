<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\FrontendController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
// Route::get('/', [FrontendController::class, 'index'])->name('home');
// Route::get('/', [ProductController::class, 'index']);
// Route::get('/', [CategoryController::class, 'index']);
Route::get('/', [ProductController::class, 'index'])->name('home');

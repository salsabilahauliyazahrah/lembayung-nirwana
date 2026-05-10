<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Models\Product;
use App\Models\Category;
use App\Models\Brand;
use App\Http\Controllers\ProductController;

Route::get('/', function () {

    $products = Product::with(['category', 'brand'])
                ->take(3) //menampilkan 3 produk terbaru
                ->get();

    return view('index', compact('products'));

})->name('home');

Route::get('/login', [AuthController::class, 'showLogin'])
    ->name('login');

Route::post('/login', [AuthController::class, 'login'])
    ->name('login.proses');

Route::post('/logout', [AuthController::class, 'logout'])
    ->name('logout');

Route::get('/products', [ProductController::class, 'index']);    
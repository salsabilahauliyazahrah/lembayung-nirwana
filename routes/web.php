<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Models\Product;
use App\Http\Controllers\ProductController;

Route::get('/', function () {
    $products = Product::with(['category', 'brand'])
        ->limit(3)
        ->get();
    return view('index', compact('products'));
})->name('home');

Route::get('/products',
    [ProductController::class, 'index']
)->name('products.index');

Route::get('/dashboard', function () {
    $products = Product::with(['category', 'brand'])
                ->limit(3)
                ->get();
    return view('dashboard', compact('products'));
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

/*
|--------------------------------------------------------------------------
| ADMIN
|--------------------------------------------------------------------------
*/

Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/admin', function () {
        return view('admin.index-admin');
    })->name('admin.dashboard');

    Route::get('/admin/products/create', function () {
        $categories = \App\Models\Category::all();
        $brands = \App\Models\Brand::all();
        return view('admin.tambah_cabin', compact('categories', 'brands'));
    })->name('admin.products.create');  

    Route::get('/admin/products/edit/{id}', function ($id) {
        $categories = \App\Models\Category::all();
        $brands = \App\Models\Brand::all();
        $product = \App\Models\Product::findOrFail($id);
        return view('admin.edit_cabin', compact('categories', 'brands', 'product'));
    })->name('admin.products.edit');

    Route::put('/admin/products/update/{id}',
        [ProductController::class, 'update']
    )->name('admin.products.update');

    Route::delete('/admin/products/delete/{id}',
        [ProductController::class, 'destroy']
    )->name('admin.products.delete');    

    Route::post('/admin/products/store',
        [ProductController::class, 'store']
    )->name('admin.products.store');    
});


require __DIR__.'/auth.php';
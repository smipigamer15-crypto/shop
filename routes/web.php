<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\AdminController;

// Головна сторінка
Route::get('/', [HomeController::class, 'index'])->name('index');

// Статичні сторінки
Route::get('/shop', [HomeController::class, 'shop'])->name('shop');
Route::get('/about', [HomeController::class, 'about'])->name('about');
Route::get('/contacts', [HomeController::class, 'contacts'])->name('contacts');


Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/products/create', [ProductController::class, 'create'])->name('products.create');
    Route::post('/products', [ProductController::class, 'store'])->name('products.store');
});


Route::get('/products/{product}/edit', [ProductController::class, 'edit'])->name('products.edit');
Route::put('/products/{product}', [ProductController::class, 'update'])->name('products.update');
Route::delete('/products/{product}', [ProductController::class, 'destroy'])->name('products.destroy');

// Сторінка одного продукту
Route::get('/shop-single', function () {
    return view('shop-single');
})->name('shop-single');

// 🔐 КОШИК (ТІЛЬКИ ДЛЯ АВТОРИЗОВАНИХ)
Route::middleware('auth')->group(function () {

    Route::post('/cart/add/{id}', [CartController::class, 'add'])->name('cart.add');
    Route::get('/cart', [CartController::class, 'index'])->name('cart.index');

});

// Dashboard
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// Профіль
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

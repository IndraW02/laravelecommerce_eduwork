<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CartController;
use App\Http\Controllers\ProductController;


Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::resource('/cart', \App\Http\Controllers\CartController::class);
    Route::resource('/orders', \App\Http\Controllers\OrderController::class);
    Route::resource('/products', ProductController::class);
    Route::get('/cart/clear', [CartController::class, 'clear'])->name('cart.clear');
});



require __DIR__.'/auth.php';

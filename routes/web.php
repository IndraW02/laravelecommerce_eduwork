<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\CartController;


Route::get('/', function () {
    return view('home');
})->name('home');

// Resource route untuk produk
Route::resource('product', ProductController::class);

// Resource route untuk order
Route::resource('order', OrderController::class);

// Route untuk halaman cart 
Route::get('/cart', [CartController::class, 'index'])->name('cart.index');
Route::get('/cart/clear', function () {
    session()->forget('cart'); 
    return redirect()->route('cart.index')->with('success', 'Keranjang berhasil dikosongkan.');
})->name('cart.clear');



Route::get('/checkout', function () {
    return 'Halaman Checkout';
});

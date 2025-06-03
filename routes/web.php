<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\OrderController;

Route::get('/', function () {
    return 'Halaman Utama';
});

// Resource route untuk produk
Route::resource('product', ProductController::class);

// Resource route untuk order
Route::resource('order', OrderController::class);

// Route untuk halaman cart dan checkout bisa kamu buat manual seperti ini:
Route::get('/cart', function () {
    return 'Halaman Cart';
});

Route::get('/checkout', function () {
    return 'Halaman Checkout';
});

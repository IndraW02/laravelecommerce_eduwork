<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return 'Halaman Utama';
});

Route::get('/products', function () {
    return 'Daftar Produk';
});

Route::get('/cart', function () {
    return 'Keranjang Belanja';
});

Route::get('/checkout', function () {
    return 'Halaman Checkout';
});


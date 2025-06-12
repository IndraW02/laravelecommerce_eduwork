@extends('layouts.app')

@section('title', 'Beranda')

@section('content')
    <div class="text-center mt-5">
        <h1>Selamat Datang di MyShop</h1>
        <p class="lead">Temukan produk terbaik hanya di sini!</p>
        <a href="{{ route('product.index') }}" class="btn btn-primary mt-3">Lihat Produk</a>
    </div>
@endsection

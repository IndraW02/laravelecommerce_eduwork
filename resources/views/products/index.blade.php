@extends('layouts.app')

@section('title', 'Daftar Produk')

@section('content')
    <h1>Daftar Produk</h1>

    <a href="{{ route('product.create') }}" class="btn btn-primary mb-3">Tambah Produk Baru</a>

    @if ($products->isEmpty())
        <p>Tidak ada produk tersedia.</p>
    @else
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nama Produk</th>
                    <th>Harga</th>
                    <th>Deskripsi</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($products as $product)
                    <tr>
                        <td>{{ $product->id }}</td>
                        <td>{{ $product->name }}</td>
                        <td>Rp {{ number_format($product->price, 2, ',', '.') }}</td>
                        <td>{{ $product->description ?? '-' }}</td>
                        <td>
                            <a href="{{ route('product.show', $product->id) }}" class="btn btn-info btn-sm">Lihat</a>
                            <a href="{{ route('product.edit', $product->id) }}" class="btn btn-warning btn-sm">Edit</a>
                            <form action="{{ route('product.destroy', $product->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus?')">Hapus</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif
@endsection

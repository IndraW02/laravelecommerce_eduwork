@extends('layouts.app')

@section('title', 'Keranjang')

@section('content')
<div class="container mt-5">
    <h1>Keranjang Belanja</h1>

    @if (session('cart') && count(session('cart')) > 0)
        <table class="table table-bordered mt-3">
            <thead>
                <tr>
                    <th>Nama Produk</th>
                    <th>Jumlah</th>
                    <th>Harga</th>
                    <th>Subtotal</th>
                </tr>
            </thead>
            <tbody>
                @php $total = 0; @endphp
                @foreach ($cart as $item)
                    @php $subtotal = $item['price'] * $item['quantity']; $total += $subtotal; @endphp
                    <tr>
                        <td>{{ $item['name'] }}</td>
                        <td>{{ $item['quantity'] }}</td>
                        <td>Rp {{ number_format($item['price'], 0, ',', '.') }}</td>
                        <td>Rp {{ number_format($subtotal, 0, ',', '.') }}</td>
                    </tr>
                @endforeach
                <tr>
                    <td colspan="3" class="text-end"><strong>Total</strong></td>
                    <td><strong>Rp {{ number_format($total, 0, ',', '.') }}</strong></td>
                </tr>
            </tbody>
        </table>
        <a href="{{ route('cart.clear') }}" class="btn btn-danger mb-3">Kosongkan Keranjang</a>

    @else
        <p class="mt-3">Keranjang kamu masih kosong.</p>
    @endif
</div>
@endsection

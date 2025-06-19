<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Keranjang Belanja') }}
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            @if ($cart->count() > 0)
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-6">
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead>
                            <tr class="bg-gray-100">
                                <th class="px-4 py-2 text-left text-sm font-medium text-gray-700">Nama Produk</th>
                                <th class="px-4 py-2 text-left text-sm font-medium text-gray-700">Jumlah</th>
                                <th class="px-4 py-2 text-left text-sm font-medium text-gray-700">Harga</th>
                                <th class="px-4 py-2 text-left text-sm font-medium text-gray-700">Subtotal</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-200">
                            @php $total = 0; @endphp
                            @foreach ($cart as $item)
                                @php
                                    $subtotal = $item->product->price * $item->quantity;
                                    $total += $subtotal;
                                @endphp
                                <tr>
                                    <td class="px-4 py-2">{{ $item->product->name }}</td>
                                    <td class="px-4 py-2">{{ $item->quantity }}</td>
                                    <td class="px-4 py-2">Rp {{ number_format($item->product->price, 0, ',', '.') }}</td>
                                    <td class="px-4 py-2">Rp {{ number_format($subtotal, 0, ',', '.') }}</td>
                                </tr>
                            @endforeach
                            <tr class="font-semibold">
                                <td colspan="3" class="px-4 py-2 text-right">Total</td>
                                <td class="px-4 py-2">Rp {{ number_format($total, 0, ',', '.') }}</td>
                            </tr>
                        </tbody>
                    </table>

                    <div class="mt-4">
                        <a href="{{ route('cart.clear') }}" class="inline-block bg-red-600 hover:bg-red-700 text-white px-4 py-2 rounded">
                            Kosongkan Keranjang
                        </a>
                    </div>
                </div>
            @else
                <p class="text-gray-600">Keranjang kamu masih kosong.</p>
            @endif

        </div>
    </div>
</x-app-layout>

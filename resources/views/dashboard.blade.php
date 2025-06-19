<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-4">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                <p class="text-gray-700">You're logged in!</p>
            </div>

            {{-- Tambahan Tombol --}}
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                <a href="{{ route('products.index') }}"
                   class="inline-block bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                    Lihat Produk
                </a>
                <a href="{{ route('cart.index') }}"
                   class="inline-block bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded ml-2">
                    Keranjang Saya
                </a>
                <a href="{{ route('orders.index') }}"
                   class="inline-block bg-purple-500 hover:bg-purple-700 text-white font-bold py-2 px-4 rounded ml-2">
                    Riwayat Order
                </a>
            </div>
        </div>
    </div>
</x-app-layout>

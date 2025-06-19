<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Daftar Produk') }}
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <a href="{{ route('products.create') }}" class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded mb-4 inline-block">
                Tambah Produk Baru
            </a>

            @if ($products->isEmpty())
                <p class="text-gray-500">Tidak ada produk tersedia.</p>
            @else
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-4">
                        <table class="min-w-full divide-y divide-gray-200">
                            <thead class="bg-gray-50">
                                <tr>
                                    <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">ID</th>
                                    <th class="px-4 py-2">Nama</th>
                                    <th class="px-4 py-2">Harga</th>
                                    <th class="px-4 py-2">Deskripsi</th>
                                    <th class="px-4 py-2">Aksi</th>
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200">
                                @foreach ($products as $product)
                                    <tr>
                                        <td class="px-4 py-2">{{ $product->id }}</td>
                                        <td class="px-4 py-2">{{ $product->name }}</td>
                                        <td class="px-4 py-2">Rp {{ number_format($product->price, 2, ',', '.') }}</td>
                                        <td class="px-4 py-2">{{ $product->description ?? '-' }}</td>
                                        <td class="px-4 py-2 space-x-1">
                                            <a href="{{ route('products.show', $product->id) }}" class="bg-gray-500 text-white px-2 py-1 rounded text-sm">Lihat</a>
                                            <a href="{{ route('products.edit', $product->id) }}" class="bg-yellow-500 text-white px-2 py-1 rounded text-sm">Edit</a>
                                            <form action="{{ route('products.destroy', $product->id) }}" method="POST" class="inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="bg-red-600 text-white px-2 py-1 rounded text-sm" onclick="return confirm('Yakin ingin menghapus?')">Hapus</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            @endif

        </div>
    </div>
</x-app-layout>

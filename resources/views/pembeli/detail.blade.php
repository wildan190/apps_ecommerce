<!-- resources/views/pembeli/detail.blade.php -->

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Detail Produk') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg p-6">
                <div class="flex items-center mb-4">
                    <img src="{{ asset('storage/' . $product->foto_produk) }}" alt="{{ $product->nama_produk }}" class="w-32 h-32 object-cover mr-4">
                    <div>
                        <h3 class="text-2xl font-semibold">{{ $product->nama_produk }}</h3>
                        <p class="text-gray-600 dark:text-gray-300">Kode Produk: {{ $product->kode_produk }}</p>
                    </div>
                </div>
                <p class="text-gray-800 dark:text-gray-200">{{ $product->deskripsi_produk }}</p>
                
                <!-- Tombol "Add To Cart" -->
                <a href="{{ route('pembeli.addToCart', $product) }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded mt-4 inline-block">
                    Add To Cart
                </a>
            </div>
        </div>
    </div>
</x-app-layout>

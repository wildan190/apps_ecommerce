<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Product Details') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg p-6">
                <h3 class="text-lg font-semibold mb-4">{{ __('Product Information') }}</h3>

                <div class="mb-4">
                    <label class="block text-gray-600 dark:text-gray-300">{{ __('Product Code') }}</label>
                    <span>{{ $product->kode_produk }}</span>
                </div>

                <div class="mb-4">
                    <label class="block text-gray-600 dark:text-gray-300">{{ __('Category') }}</label>
                    <span>{{ $product->category->nama_kategori }}</span>
                </div>

                <div class="mb-4">
                    <label class="block text-gray-600 dark:text-gray-300">{{ __('Product Name') }}</label>
                    <span>{{ $product->nama_produk }}</span>
                </div>

                <div class="mb-4">
                    <label class="block text-gray-600 dark:text-gray-300">{{ __('Price') }}</label>
                    <span>{{ $product->harga_produk }}</span>
                </div>

                <div class="mb-4">
                    <label class="block text-gray-600 dark:text-gray-300">{{ __('Description') }}</label>
                    <span>{{ $product->deskripsi_produk }}</span>
                </div>

                @if ($product->foto_produk)
                <div class="mb-4">
                    <label class="block text-gray-600 dark:text-gray-300">{{ __('Product Image') }}</label>
                    <img src="{{ asset('storage/' . $product->foto_produk) }}" alt="{{ $product->nama_produk }}" class="max-w-xs">
                </div>
                @endif

                <div class="mt-4">
                    <a href="{{ route('products.edit', $product->id) }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                        {{ __('Edit Product') }}
                    </a>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

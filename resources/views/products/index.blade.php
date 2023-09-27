<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Product Management') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg p-6">
                <h3 class="text-lg font-semibold mb-4">{{ __('Products') }}</h3>

                <!-- Tombol Tambah Produk -->
                <a href="{{ route('products.create') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                    {{ __('Add Product') }}
                </a>

                <!-- Grid Produk -->
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4 mt-4">
                    @foreach ($products as $product)
                        <div class="bg-white dark:bg-gray-200 overflow-hidden shadow-sm sm:rounded-lg">
                            @if ($product->foto_produk)
                                <img src="{{ asset('storage/' . $product->foto_produk) }}" alt="{{ $product->nama_produk }}" class="w-full h-32 object-cover">
                            @endif
                            <div class="p-6">
                                <h4 class="font-semibold text-lg">{{ $product->nama_produk }}</h4>
                                <p class="text-gray-600 dark:text-gray-400">{{ $product->harga_produk }}</p>
                                <div class="mt-4">
                                    <a href="{{ route('products.show', $product->id) }}" class="text-blue-500 hover:text-blue-700">{{ __('View Details') }}</a>
                                    |
                                    <a href="{{ route('products.edit', $product->id) }}" class="text-blue-500 hover:text-blue-700">{{ __('Edit') }}</a>
                                    |
                                    <form action="{{ route('products.destroy', $product->id) }}" method="POST" class="inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="text-red-500 hover:text-red-700">{{ __('Delete') }}</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

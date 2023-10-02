<x-app-layout>
<x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard Pembeli') }}
        </h2>

        <!-- Tambahkan link untuk mengakses fitur pembeli -->
        <div class="text-right">
            <a href="{{ route('pembeli.index') }}" class="text-blue-500 hover:text-blue-700 mr-4">{{ __('Explore Products') }}</a>
            <a href="{{ route('pembeli.viewCart') }}" class="text-blue-500 hover:text-blue-700 mr-4">{{ __('View Cart') }}</a>
            <a href="{{ route('pembeli.orders.index') }}" class="text-blue-500 hover:text-blue-700">{{ __('My Orders') }}</a>
            <!-- Tambahkan link untuk fitur lainnya jika diperlukan -->
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg">
                <!-- Konten Pembeli -->
                <div class="p-6">
                    <h2 class="text-2xl font-semibold">Daftar Produk</h2>

                    <!-- Daftar Produk -->
                    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4 mt-4">
                        @foreach ($products as $product)
                            <div class="bg-white dark:bg-gray-700 overflow-hidden shadow-lg sm:rounded-lg">
                                <img src="{{ asset('storage/' . $product->foto_produk) }}" alt="{{ $product->nama_produk }}" class="w-full h-48 object-cover">
                                <div class="p-4">
                                    <h3 class="text-lg font-semibold">{{ $product->nama_produk }}</h3>
                                    <p class="text-gray-600 dark:text-gray-300">Harga: {{ $product->harga_produk }}</p>
                                    <a href="{{ route('pembeli.addToCart', $product) }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded mt-2 block">Tambah ke Keranjang</a>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
                <!-- End of Konten Pembeli -->
            </div>
        </div>
    </div>
</x-app-layout>

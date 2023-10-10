<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Keranjang Belanja') }}
        </h2>
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
                <!-- Konten Keranjang Belanja -->
                <div class="p-6">
                    <h2 class="text-2xl font-semibold">Keranjang Belanja</h2>

                    @if (empty($cart))
                        <p>Keranjang belanja Anda kosong.</p>
                    @else
                        <table class="min-w-full divide-y divide-gray-200 mt-4">
                            <thead>
                                <tr>
                                    <th class="px-6 py-3 bg-gray-50 dark:bg-gray-700 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                                        Nama Produk
                                    </th>
                                    <th class="px-6 py-3 bg-gray-50 dark:bg-gray-700 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                                        Harga
                                    </th>
                                    <th class="px-6 py-3 bg-gray-50 dark:bg-gray-700 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                                        Jumlah
                                    </th>
                                    <th class="px-6 py-3 bg-gray-50 dark:bg-gray-700 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                                        Subtotal
                                    </th>
                                    <th class="px-6 py-3 bg-gray-50 dark:bg-gray-700 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                                        Aksi
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($cart as $productId => $item)
                                    <tr>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            {{ $item['nama'] }}
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            {{ $item['harga'] }}
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            {{ $item['jumlah'] }}
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            {{ $item['harga'] * $item['jumlah'] }}
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <a href="{{ route('pembeli.removeFromCart', $productId) }}" class="text-red-500 hover:text-red-700">Hapus</a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>

                        <div class="mt-4">
                            <p class="text-xl font-semibold">Total Belanja: {{ $total }}</p>
                            <a href="{{ route('pembeli.checkout') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded mt-2">Checkout</a>
                        </div>
                    @endif
                </div>
                <!-- End of Konten Keranjang Belanja -->
            </div>
        </div>
    </div>
</x-app-layout>

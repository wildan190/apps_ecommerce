<!-- resources/views/sales-report.blade.php -->

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Sales Report') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg p-6">
                <h3 class="text-2xl font-semibold mb-4">{{ __('Sales Report') }}</h3>

                <!-- Tombol Cetak PDF -->
                <a href="{{ route('sales-report.pdf') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded mb-4">
                    {{ __('Cetak PDF') }}
                </a>

                <!-- Tampilkan data laporan penjualan -->
                <table class="table-auto w-full mt-4">
                    <thead>
                        <tr class="bg-blue-200 dark:bg-gray-700">
                            <th class="px-4 py-2">{{ __('Order ID') }}</th>
                            <th class="px-4 py-2">{{ __('Product Name') }}</th>
                            <th class="px-4 py-2">{{ __('Quantity Sold') }}</th>
                            <th class="px-4 py-2">{{ __('Total Amount') }}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($salesData as $item)
                            <tr class="bg-white dark:bg-gray-200">
                                <td class="border px-4 py-2">{{ $item->order_id }}</td>
                                <td class="border px-4 py-2">{{ $item->product->nama_produk }}</td>
                                <td class="border px-4 py-2">{{ $item->jumlah }}</td>
                                <td class="border px-4 py-2">{{ $item->harga }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-app-layout>

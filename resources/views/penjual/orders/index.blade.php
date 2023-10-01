<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Manajemen Pesanan') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg p-6">
                <h2 class="text-2xl font-semibold mb-4">Pesanan yang perlu dikonfirmasi:</h2>

                @if($orders->isEmpty())
                <p>Tidak ada pesanan yang perlu dikonfirmasi.</p>
                @else
                <table class="min-w-full divide-y divide-gray-200">
                    <thead>
                        <tr>
                            <th class="px-6 py-3 bg-gray-50 dark:bg-gray-700 text-left text-xs leading-4 font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">Nama Produk</th>
                            <th class="px-6 py-3 bg-gray-50 dark:bg-gray-700 text-left text-xs leading-4 font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">Jumlah</th>
                            <th class="px-6 py-3 bg-gray-50 dark:bg-gray-700 text-left text-xs leading-4 font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">Nama Penerima</th>
                            <th class="px-6 py-3 bg-gray-50 dark:bg-gray-700 text-left text-xs leading-4 font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">Alamat Lengkap</th>
                            <th class="px-6 py-3 bg-gray-50 dark:bg-gray-700 text-left text-xs leading-4 font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">Total Harga</th>
                            <th class="px-6 py-3 bg-gray-50 dark:bg-gray-700"></th>
                        </tr>
                    </thead>
                    <tbody class="bg-white dark:bg-gray-800 divide-y divide-gray-200">
                        @foreach($orders as $order)
                        <tr>
                            <td class="px-6 py-4 whitespace-no-wrap">{{ $order->orderItems->pluck('product.nama_produk')->implode(', ') }}</td>
                            <td class="px-6 py-4 whitespace-no-wrap">{{ $order->orderItems->sum('jumlah') }}</td>
                            <td class="px-6 py-4 whitespace-no-wrap">{{ $order->nama_penerima }}</td>
                            <td class="px-6 py-4 whitespace-no-wrap">{{ $order->alamat_lengkap }}</td>
                            <td class="px-6 py-4 whitespace-no-wrap">{{ number_format($order->orderItems->sum('harga'), 2) }}</td>
                            <td class="px-6 py-4 whitespace-no-wrap">
                                <a href="{{ route('penjual.orders.show', $order->id) }}" class="text-yellow-500 hover:text-green-700">Show</a>
                                <a href="{{ route('penjual.confirmOrder', $order->id) }}" class="text-blue-500 hover:text-blue-700">Konfirmasi</a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                @endif
            </div>
        </div>
    </div>
</x-app-layout>
<!-- resources/views/pembeli/orders/index.blade.php -->
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Pesanan Saya') }}
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
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg p-6">
                <h1 class="text-2xl font-semibold mb-4">Daftar Pesanan</h1>

                <table class="min-w-full">
                    <thead>
                        <tr>
                            <th class="px-4 py-2">Nomor Pesanan</th>
                            <th class="px-4 py-2">Tanggal Pesanan</th>
                            <th class="px-4 py-2">Status Pesanan</th>
                            <th class="px-4 py-2">Action</th>
                            <!-- Tambahkan kolom lainnya sesuai kebutuhan -->
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($orders as $order)
                        <tr>
                            <td class="px-4 py-2">{{ $order->id }}</td>
                            <td class="px-4 py-2">{{ $order->created_at->format('d/m/Y H:i') }}</td>
                            <td class="px-4 py-2">{{ $order->status }}</td>
                            <td>
                                <a href="{{ route('pembeli.orders.show', $order->id) }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded mt-2">View</a>
                            </td>
                            <!-- Tambahkan kolom lainnya sesuai kebutuhan -->
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-app-layout>
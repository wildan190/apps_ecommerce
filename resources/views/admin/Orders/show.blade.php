<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Detail Pesanan') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg p-6">
                <h3 class="text-2xl font-semibold mb-4">{{ __('Detail Pesanan') }}</h3>

                <!-- Tampilkan informasi detail pesanan -->
                <div class="mb-4">
                    <p><strong>ID Pesanan:</strong> {{ $order->id }}</p>
                    <p><strong>Tanggal Pesanan:</strong> {{ $order->created_at }}</p>
                    <!-- Tambahkan informasi lainnya tentang pesanan di sini -->
                </div>

                <!-- Tampilkan daftar produk dalam pesanan -->
                <h4 class="text-xl font-semibold mb-2">Daftar Produk dalam Pesanan</h4>
                <table class="table-auto w-full">
                    <thead>
                        <tr class="bg-blue-200 dark:bg-gray-700">
                            <th class="px-4 py-2">Nama Produk</th>
                            <th class="px-4 py-2">Kuantitas</th>
                            <th class="px-4 py-2">Harga</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($order->orderItems as $item)
                        <tr class="bg-white dark:bg-gray-200">
                            <td class="border px-4 py-2">{{ $item->product->nama_produk }}</td>
                            <td class="border px-4 py-2">{{ $item->jumlah }}</td>
                            <td class="border px-4 py-2">{{ $item->harga }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>

                <!-- Tombol "Kembali" -->
                <a href="{{ route('admin.orders.index') }}" class="bg-gray-300 hover:bg-gray-400 text-gray-800 font-bold py-2 px-4 rounded inline-block mt-4">
                    Kembali
                </a>
            </div>
        </div>
    </div>
</x-app-layout>
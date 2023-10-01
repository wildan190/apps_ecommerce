@php
$subtotal = 0;
$taxRate = 0.1; // 10% pajak (Anda bisa menyesuaikan dengan tarif pajak yang sesuai)
@endphp

@foreach ($order->orderItems as $item)
@php
$subtotal += $item->jumlah * $item->product->harga_produk;
@endphp
@endforeach

@php
$tax = $subtotal * $taxRate;
$total = $subtotal + $tax;
@endphp
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Detail Pesanan') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg p-6">
                <h2 class="text-2xl font-semibold mb-4">Detail Pesanan</h2>

                <p>Nomor Pesanan: {{ $order->id }}</p>
                <p>Tanggal Pesanan: {{ $order->created_at }}</p>
                <!-- Tampilkan informasi lainnya seperti total harga, status, dll -->

                <h3 class="text-xl font-semibold mt-4">Produk yang Dibeli</h3>
                @foreach ($order->orderItems as $item)
                <div class="mb-4">
                    <div class="flex items-center">
                        <img src="{{ asset('storage/' . $item->product->foto_produk) }}" alt="{{ $item->product->nama_produk }}" class="w-16 h-16 object-cover rounded-full">
                        <div class="ml-4">
                            <p>Nama Produk: {{ $item->product->nama_produk }}</p>
                            <p>Jumlah: {{ $item->jumlah }}</p>
                            <p>Harga: {{ $item->product->harga_produk }}</p>
                        </div>
                    </div>
                </div>
                @endforeach

                <h3 class="text-xl font-semibold mt-4">Detail Invoice</h3>
                <table class="table-auto w-full mt-4">
                    <thead>
                        <tr>
                            <th class="px-4 py-2">Deskripsi</th>
                            <th class="px-4 py-2">Harga</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($order->orderItems as $item)
                        <tr>
                            <td class="px-4 py-2">{{ $item->product->nama_produk }} ({{ $item->jumlah }} item)</td>
                            <td class="px-4 py-2">Rp {{ number_format($item->jumlah * $item->product->harga_produk, 0, ',', '.') }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>

                <!-- Subtotal -->
                <div class="flex justify-between mt-4">
                    <span class="font-semibold">Subtotal:</span>
                    <span>Rp {{ number_format($subtotal, 0, ',', '.') }}</span>
                </div>

                <!-- Pajak (jika ada) -->
                <div class="flex justify-between mt-2">
                    <span class="font-semibold">Pajak (10%):</span>
                    <span>Rp {{ number_format($tax, 0, ',', '.') }}</span>
                </div>

                <!-- Total -->
                <div class="flex justify-between mt-4">
                    <span class="font-semibold">Total:</span>
                    <span class="font-semibold text-xl">Rp {{ number_format($subtotal + $tax, 0, ',', '.') }}</span>
                </div>

                <a href="javascript:history.back()" class="bg-gray-300 hover:bg-gray-400 text-gray-800 font-bold py-2 px-4 rounded inline-block mt-4">
                    Kembali
                </a>


            </div>
        </div>
    </div>
</x-app-layout>
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
                <div class="bg-blue-100 dark:bg-blue-700 border border-blue-200 dark:border-blue-600 p-4 rounded-lg mb-4">
                    <h2 class="text-2xl font-semibold text-blue-800 dark:text-blue-200">Detail Pesanan</h2>
                    <p class="text-gray-600 dark:text-gray-300">Nomor Pesanan: {{ $order->id }}</p>
                    <p class="text-gray-600 dark:text-gray-300">Tanggal Pesanan: {{ $order->created_at }}</p>
                    <!-- Informasi lainnya seperti status, total harga, dll -->
                </div>

                <div class="bg-white dark:bg-gray-800 border border-gray-200 dark:border-gray-600 p-4 rounded-lg mb-4">
                    <h3 class="text-xl font-semibold mb-4">Produk yang Dibeli</h3>
                    @foreach ($order->orderItems as $item)
                    <div class="mb-4 border-b border-gray-200 dark:border-gray-600 pb-4">
                        <div class="flex items-center">
                            <img src="{{ asset('storage/' . $item->product->foto_produk) }}" alt="{{ $item->product->nama_produk }}" class="w-16 h-16 object-cover rounded-full">
                            <div class="ml-4">
                                <p class="text-gray-800 dark:text-gray-200">Nama Produk: {{ $item->product->nama_produk }}</p>
                                <p class="text-gray-800 dark:text-gray-200">Jumlah: {{ $item->jumlah }}</p>
                                <p class="text-gray-800 dark:text-gray-200">Harga: {{ $item->product->harga_produk }}</p>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>

                <div class="bg-white dark:bg-gray-800 border border-gray-200 dark:border-gray-600 p-4 rounded-lg mb-4">
                    <h3 class="text-xl font-semibold mb-4">Informasi Penerima</h3>
                    <p class="text-gray-800 dark:text-gray-200">Nama Penerima: {{ $order->nama_penerima }}</p>
                    <p class="text-gray-800 dark:text-gray-200">Nomor Telepon: {{ $order->nomor_telepon }}</p>
                    <p class="text-gray-800 dark:text-gray-200">Alamat Lengkap: {{ $order->alamat_lengkap }}</p>
                    <p class="text-gray-800 dark:text-gray-200">Kota: {{ $order->kota }}</p>
                    <p class="text-gray-800 dark:text-gray-200">Provinsi: {{ $order->provinsi }}</p>
                    <p class="text-gray-800 dark:text-gray-200">Kode Pos: {{ $order->kode_pos }}</p>
                </div>

                <div class="bg-white dark:bg-gray-800 border border-gray-200 dark:border-gray-600 p-4 rounded-lg mb-4">
                    <h3 class="text-xl font-semibold mb-4">Detail Invoice</h3>
                    <table class="table-auto w-full mb-4">
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
                </div>

                <!-- Tombol Cetak Invoice -->
                <a href="{{ route('penjual.cetakInvoice', $order->id) }}" class="bg-green-500 hover:bg-green-600 text-white font-bold py-2 px-4 rounded inline-block mt-4">
                    Cetak Invoice
                </a>

                <!-- Tombol Kembali -->
                <a href="{{ route('penjual.orders') }}" class="bg-gray-300 hover:bg-gray-400 text-gray-800 font-bold py-2 px-4 rounded inline-block mt-4">
                    Kembali
                </a>
            </div>
        </div>
    </div>
</x-app-layout>

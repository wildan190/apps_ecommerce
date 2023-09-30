<!-- resources/views/thankyou.blade.php -->

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Terima Kasih') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg p-6">
                <p class="text-2xl font-semibold mb-4">Pesanan Anda telah berhasil disimpan!</p>
                <a href="{{ route('pembeli.index') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Lanjutkan Belanja</a>

                <!-- Tambahkan tombol "Lihat Pesanan" -->
                <a href="{{ route('pembeli.orders.index') }}" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded mt-4">Lihat Pesanan</a>
            </div>
        </div>
    </div>
</x-app-layout>

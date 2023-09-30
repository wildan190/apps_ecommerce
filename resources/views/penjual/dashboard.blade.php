<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg p-6">
                <!-- Tambahkan tombol rute ke halaman manajemen pesanan Penjual -->
                <a href="{{ route('penjual.orders') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded mb-4">Manajemen Pesanan</a>

                <!-- Isi konten dashboard sesuai kebutuhan Anda -->
                <!-- Contoh: -->
                <p>Selamat datang di halaman dashboard Penjual. Anda dapat mengakses manajemen pesanan dengan mengeklik tombol di atas.</p>
            </div>
        </div>
    </div>
</x-app-layout>

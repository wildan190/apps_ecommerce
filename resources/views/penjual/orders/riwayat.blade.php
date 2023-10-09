<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Riwayat Order (Dikonfirmasi)') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg p-6">
                <h3 class="text-2xl font-semibold mb-4">{{ __('Riwayat Order (Dikonfirmasi)') }}</h3>

                <!-- Loop melalui daftar order yang telah dikonfirmasi -->
                @foreach ($confirmedOrders as $order)
                <div class="bg-blue-100 dark:bg-blue-700 border border-blue-200 dark:border-blue-600 p-4 rounded-lg mb-4">
                    <h4 class="text-xl font-semibold text-blue-800 dark:text-blue-200">{{ __('Order #:') }} {{ $order->id }}</h4>
                    <p class="text-gray-600 dark:text-gray-300">{{ __('Tanggal Pesanan: ') }} {{ $order->created_at }}</p>
                    <!-- Tambahkan informasi lainnya tentang pesanan di sini -->
                    <div class="mt-2">
                        <!-- Tombol "Show" untuk melihat detail pesanan -->
                        <a href="{{ route('penjual.orders.show', $order->id) }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded inline-block">
                            {{ __('Show') }}
                        </a>
                    </div>
                </div>
                @endforeach

                <!-- Tampilkan pesan jika tidak ada order yang telah dikonfirmasi -->
                @if ($confirmedOrders->isEmpty())
                <p>{{ __('Tidak ada riwayat order yang telah dikonfirmasi.') }}</p>
                @endif

                <!-- Tombol "Kembali" -->
                <button onclick="history.back()" class="bg-gray-300 hover:bg-gray-400 text-gray-800 font-bold py-2 px-4 rounded inline-block mt-4">
                    Kembali
                </button>
            </div>
        </div>
</x-app-layout>
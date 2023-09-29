<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Checkout') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg">
                <!-- Konten Checkout -->
                <div class="p-6">
                    <h2 class="text-2xl font-semibold">Alamat dan Pengiriman</h2>

                    <!-- Form Alamat dan Pengiriman -->
                    <form action="{{ route('pembeli.processOrder') }}" method="POST">
                        @csrf

                        <!-- Nama Penerima -->
                        <div class="mb-4">
                            <label for="nama_penerima" class="block text-gray-700 dark:text-gray-300 font-bold mb-2">
                                Nama Penerima
                            </label>
                            <input type="text" id="nama_penerima" name="nama_penerima" class="form-input rounded-md shadow-sm mt-1 block w-full" required />
                        </div>

                        <!-- Nomor Telepon -->
                        <div class="mb-4">
                            <label for="nomor_telepon" class="block text-gray-700 dark:text-gray-300 font-bold mb-2">
                                Nomor Telepon
                            </label>
                            <input type="text" id="nomor_telepon" name="nomor_telepon" class="form-input rounded-md shadow-sm mt-1 block w-full" required />
                        </div>

                        <!-- Alamat Lengkap -->
                        <div class="mb-4">
                            <label for="alamat_lengkap" class="block text-gray-700 dark:text-gray-300 font-bold mb-2">
                                Alamat Lengkap
                            </label>
                            <textarea id="alamat_lengkap" name="alamat_lengkap" rows="3" class="form-textarea rounded-md shadow-sm mt-1 block w-full" required></textarea>
                        </div>

                        <!-- Kota -->
                        <div class="mb-4">
                            <label for="kota" class="block text-gray-700 dark:text-gray-300 font-bold mb-2">
                                Kota
                            </label>
                            <input type="text" id="kota" name="kota" class="form-input rounded-md shadow-sm mt-1 block w-full" required />
                        </div>

                        <!-- Provinsi -->
                        <div class="mb-4">
                            <label for="provinsi" class="block text-gray-700 dark:text-gray-300 font-bold mb-2">
                                Provinsi
                            </label>
                            <input type="text" id="provinsi" name="provinsi" class="form-input rounded-md shadow-sm mt-1 block w-full" required />
                        </div>

                        <!-- Kode Pos -->
                        <div class="mb-4">
                            <label for="kode_pos" class="block text-gray-700 dark:text-gray-300 font-bold mb-2">
                                Kode Pos
                            </label>
                            <input type="text" id="kode_pos" name="kode_pos" class="form-input rounded-md shadow-sm mt-1 block w-full" required />
                        </div>

                        <!-- Metode Pembayaran (contoh dropdown) -->
                        <div class="mb-4">
                            <label for="metode_pembayaran" class="block text-gray-700 dark:text-gray-300 font-bold mb-2">
                                Metode Pembayaran
                            </label>
                            <select id="metode_pembayaran" name="metode_pembayaran" class="form-select rounded-md shadow-sm mt-1 block w-full" required>
                                <option value="transfer">Transfer Bank</option>
                                <option value="kartu_kredit">Kartu Kredit</option>
                                <option value="e_wallet">E-Wallet</option>
                            </select>
                        </div>

                        <!-- Tombol Proses Pesanan -->
                        <div class="mt-6">
                            <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded mt-2">Proses Pesanan</button>
                        </div>
                    </form>


                </div>
                <!-- End of Konten Checkout -->
            </div>
        </div>
    </div>
</x-app-layout>
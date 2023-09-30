@if(session('success'))
<div class="bg-green-200 text-green-800 py-2 px-4 mb-4 rounded">
    {{ session('success') }}
</div>
@endif

@if($errors->any())
<div class="bg-red-200 text-red-800 py-2 px-4 mb-4 rounded">
    <ul>
        @foreach($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif
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
                    <form action="{{ route('pembeli.storeOrder') }}" method="POST">
                        @csrf

                        <!-- Informasi Produk yang Dibeli -->
                    @if (!empty($cart))
                        <h3 class="text-xl font-semibold mt-4">Produk yang Dibeli:</h3>
                        @foreach ($cart as $productId => $item)
                            <div class="bg-gray-100 dark:bg-gray-700 p-4 rounded-lg mb-4">
                                <h4 class="text-lg font-semibold">{{ $item['nama'] }}</h4>
                                <p>Jumlah: {{ $item['jumlah'] }}</p>
                                <p>Total Harga: {{ $item['harga'] * $item['jumlah'] }}</p>
                                <!-- Anda bisa menambahkan informasi produk lainnya di sini -->
                            </div>
                        @endforeach
                    @endif

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
                            <input type="tel" id="nomor_telepon" name="nomor_telepon" class="form-input rounded-md shadow-sm mt-1 block w-full" required />
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

                        <!-- Metode Pembayaran -->
                        <div class="mb-4">
                            <label class="block text-gray-700 dark:text-gray-300 font-bold mb-2">Metode Pembayaran</label>
                            <div class="mt-2">
                                <!--<label class="inline-flex items-center">
                                    <input type="radio" name="metode_pembayaran" value="transfer" required class="form-radio">
                                    <span class="ml-2">Transfer Bank</span>
                                </label>-->
                                <label class="inline-flex items-center ml-6">
                                    <input type="radio" name="metode_pembayaran" value="kartu_kredit" class="form-radio">
                                    <span class="ml-2">Kartu Kredit / Debit</span>
                                </label>
                                <label class="inline-flex items-center ml-6">
                                    <input type="radio" name="metode_pembayaran" value="eWallet" class="form-radio">
                                    <span class="ml-2">E-Wallet (OVO, DANA, dll)</span>
                                </label>
                                <label class="inline-flex items-center ml-6">
                                    <input type="radio" name="metode_pembayaran" value="cash_on_delivery" class="form-radio">
                                    <span class="ml-2">Cash On Delivery</span>
                                </label>
                            </div>
                        </div>

                        <!-- Form Kartu Kredit -->
                        <div class="mb-4 kartu-kredit hidden">
                            <label for="nama_kartu" class="block text-gray-700 dark:text-gray-300 font-bold mb-2">Nama Pemegang Kartu</label>
                            <input type="text" id="nama_kartu" name="nama_kartu" class="form-input rounded-md shadow-sm mt-1 block w-full" placeholder="Nama Pemegang Kartu">
                            <label for="nomor_kartu" class="block text-gray-700 dark:text-gray-300 font-bold mb-2">Nomor Kartu Kredit</label>
                            <input type="text" id="nomor_kartu" name="nomor_kartu" class="form-input rounded-md shadow-sm mt-1 block w-full" placeholder="Nomor Kartu">
                            <label for="tanggal_expire" class="block text-gray-700 dark:text-gray-300 font-bold mb-2">Tanggal Expired</label>
                            <input type="month" id="tanggal_expire" name="tanggal_expire" class="form-input rounded-md shadow-sm mt-1 block w-full" require>
                            <label for="nomor_cvv" class="block text-gray-700 dark:text-gray-300 font-bold mb-2">CVC</label>
                            <input type="number" id="nomor_cvv" name="nomor_cvv" class="form-input rounded-md shadow-sm mt-1 block w-full" placeholder="CVC">
                            <!-- Tambahkan bidang lain untuk kartu kredit sesuai kebutuhan -->
                        </div>

                        <!-- Form E-Wallet -->
                        <div class="mb-4 ewallet hidden">
                            <label for="nomor_ewallet" class="block text-gray-700 dark:text-gray-300 font-bold mb-2">Nomor E-Wallet (OVO, DANA, dll)</label>
                            <input type="text" id="nomor_ewallet" name="nomor_ewallet" class="form-input rounded-md shadow-sm mt-1 block w-full" placeholder="etc. 087772672674">
                        </div>

                        <!-- Form Transfer Bank 
                        <div class="mb-4 transfer-bank hidden">
                            <label for="nama_bank" class="block text-gray-700 dark:text-gray-300 font-bold mb-2">Nama Bank</label>
                            <input type="text" id="nama_bank" name="nama_bank" class="form-input rounded-md shadow-sm mt-1 block w-full">
                            <label for="nomor_va" class="block text-gray-700 dark:text-gray-300 font-bold mb-2 mt-4">Nomor Virtual Account</label>
                            <input type="text" id="nomor_va" name="nomor_va" class="form-input rounded-md shadow-sm mt-1 block w-full">
                            <label for="tata_cara_pembayaran" class="block text-gray-700 dark:text-gray-300 font-bold mb-2 mt-4">Tata Cara Pembayaran</label>
                            <textarea id="tata_cara_pembayaran" name="tata_cara_pembayaran" rows="3" class="form-textarea rounded-md shadow-sm mt-1 block w-full"></textarea>
                        </div>-->

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

<!-- Script JavaScript untuk menampilkan/menyembunyikan formulir sesuai metode pembayaran yang dipilih -->
<script>
    document.addEventListener("DOMContentLoaded", function() {
        const metodePembayaranRadio = document.querySelectorAll('input[name="metode_pembayaran"]');
        const kartuKreditForm = document.querySelector('.kartu-kredit');
        const ewalletForm = document.querySelector('.ewallet');
        const transferBankForm = document.querySelector('.transfer-bank');

        // Tampilkan/menyembunyikan formulir sesuai metode pembayaran yang dipilih
        metodePembayaranRadio.forEach((radio) => {
            radio.addEventListener("change", function() {
                if (radio.value === "kartu_kredit") {
                    kartuKreditForm.classList.remove('hidden');
                    ewalletForm.classList.add('hidden');
                    //transferBankForm.classList.add('hidden');
                } else if (radio.value === "eWallet") {
                    kartuKreditForm.classList.add('hidden');
                    ewalletForm.classList.remove('hidden');
                    //transferBankForm.classList.add('hidden');
                } else if (radio.value === "transfer") {
                    kartuKreditForm.classList.add('hidden');
                    ewalletForm.classList.add('hidden');
                    //transferBankForm.classList.remove('hidden');
                } else {
                    kartuKreditForm.classList.add('hidden');
                    ewalletForm.classList.add('hidden');
                    //transferBankForm.classList.add('hidden');
                }
            });
        });
    });
</script>
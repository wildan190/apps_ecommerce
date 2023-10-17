<!-- resources/views/admin/products.blade.php -->

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Daftar Produk') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg p-6">
                <h3 class="text-2xl font-semibold mb-4">{{ __('Daftar Produk') }}</h3>

                <!-- Tampilkan data produk -->
                <table class="table-auto w-full mt-4">
                    <thead>
                        <tr class="bg-blue-200 dark:bg-gray-700">
                            <th class="px-4 py-2">{{ __('ID Produk') }}</th>
                            <th class="px-4 py-2">{{ __('Nama Produk') }}</th>
                            <th class="px-4 py-2">{{ __('Harga Produk') }}</th>
                            <th class="px-4 py-2">{{ __('Kategori') }}</th>
                            <th class="px-4 py-2">{{ __('Action') }}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($products as $product)
                        <tr class="bg-white dark:bg-gray-200">
                            <td class="border px-4 py-2">{{ $product->id }}</td>
                            <td class="border px-4 py-2">{{ $product->nama_produk }}</td>
                            <td class="border px-4 py-2">{{ $product->harga_produk }}</td>
                            <td class="border px-4 py-2">{{ $product->category->nama_kategori }}</td>
                            <!-- Tambahkan ini ke dalam loop foreach di dalam tabel produk -->
                            <td class="border px-4 py-2">
                                <form action="{{ route('admin.products.destroy', $product->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-500 hover:text-red-700">{{ __('Delete') }}</button>
                                </form>
                            </td>

                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <script>
        function confirmDelete(productId) {
            if (confirm('Anda yakin ingin menghapus produk ini?')) {
                document.getElementById('delete-form-' + productId).submit();
            }
        }
    </script>
</x-app-layout>
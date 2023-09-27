<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Product Management') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg p-6">
                <h3 class="text-lg font-semibold mb-4">{{ __('Products') }}</h3>

                <!-- Tombol Tambah Produk -->
                <a href="{{ route('products.create') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                    {{ __('Add Product') }}
                </a>

                <!-- Tabel Daftar Produk -->
                <table class="table-auto w-full mt-4">
                    <thead>
                        <tr>
                            <th class="px-4 py-2">{{ __('ID') }}</th>
                            <th class="px-4 py-2">{{ __('Product Code') }}</th>
                            <th class="px-4 py-2">{{ __('Category') }}</th>
                            <th class="px-4 py-2">{{ __('Product Name') }}</th>
                            <th class="px-4 py-2">{{ __('Price') }}</th>
                            <th class="px-4 py-2">{{ __('Actions') }}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($products as $product)
                            <tr>
                                <td class="border px-4 py-2">{{ $product->id }}</td>
                                <td class="border px-4 py-2">{{ $product->kode_produk }}</td>
                                <td class="border px-4 py-2">{{ $product->category->nama_kategori }}</td>
                                <td class="border px-4 py-2">{{ $product->nama_produk }}</td>
                                <td class="border px-4 py-2">{{ $product->harga_produk }}</td>
                                <td class="border px-4 py-2">
                                    <a href="{{ route('products.edit', $product->id) }}" class="text-blue-500 hover:text-blue-700">{{ __('Edit') }}</a>
                                    |
                                    <form action="{{ route('products.destroy', $product->id) }}" method="POST" class="inline">
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
</x-app-layout>

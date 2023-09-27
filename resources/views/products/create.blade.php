<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Create Product') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg p-6">
                <h3 class="text-lg font-semibold mb-4">{{ __('Product Information') }}</h3>

                <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-4">
                        <label for="kode_produk" class="block text-gray-600 dark:text-gray-300">{{ __('Product Code') }}</label>
                        <input type="text" name="kode_produk" id="kode_produk" class="form-input mt-1 block w-full" required>
                    </div>

                    <div class="mb-4">
                        <label for="kategori_produk_id" class="block text-gray-600 dark:text-gray-300">{{ __('Category') }}</label>
                        <select name="kategori_produk_id" id="kategori_produk_id" class="form-select mt-1 block w-full" required>
                            @foreach($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->nama_kategori }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-4">
                        <label for="nama_produk" class="block text-gray-600 dark:text-gray-300">{{ __('Product Name') }}</label>
                        <input type="text" name="nama_produk" id="nama_produk" class="form-input mt-1 block w-full" required>
                    </div>

                    <div class="mb-4">
                        <label for="harga_produk" class="block text-gray-600 dark:text-gray-300">{{ __('Price') }}</label>
                        <input type="number" name="harga_produk" id="harga_produk" class="form-input mt-1 block w-full" required>
                    </div>

                    <div class="mb-4">
                        <label for="deskripsi_produk" class="block text-gray-600 dark:text-gray-300">{{ __('Description') }}</label>
                        <textarea name="deskripsi_produk" id="deskripsi_produk" class="form-textarea mt-1 block w-full" rows="4" required></textarea>
                    </div>

                    <div class="mb-4">
                        <label for="foto_produk" class="block text-gray-600 dark:text-gray-300">{{ __('Product Image') }}</label>
                        <input type="file" name="foto_produk" id="foto_produk" class="form-input mt-1 block w-full">
                    </div>

                    <div class="mt-4">
                        <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                            {{ __('Create Product') }}
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>

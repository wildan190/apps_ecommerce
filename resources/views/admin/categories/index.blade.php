@if(session('success'))
<div class="bg-green-200 text-green-800 py-2 px-4 mb-4 rounded">
    {{ session('success') }}
</div>
@endif

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Category Management') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg p-6">
                <h3 class="text-lg font-semibold mb-4">{{ __('Categories') }}</h3>

                <!-- Tombol Tambah Kategori -->
                <a href="{{ route('admin.categories.create') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                    {{ __('Add Category') }}
                </a>

                <!-- Tabel Daftar Kategori -->
                <table class="table-auto w-full mt-4">
                    <thead>
                        <tr class="bg-blue-200 dark:bg-gray-700">
                            <th class="px-4 py-2">{{ __('ID') }}</th>
                            <th class="px-4 py-2">{{ __('Category Name') }}</th>
                            <th class="px-4 py-2">{{ __('Actions') }}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($categories as $category)
                            <tr class="bg-white dark:bg-gray-200">
                                <td class="border px-4 py-2">{{ $category->id }}</td>
                                <td class="border px-4 py-2">{{ $category->nama_kategori }}</td>
                                <td class="border px-4 py-2">
                                    <a href="{{ route('categories.edit', $category->id) }}" class="text-blue-500 hover:text-blue-700">{{ __('Edit') }}</a>
                                    |
                                    <form action="{{ route('categories.destroy', $category->id) }}" method="POST" class="inline">
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

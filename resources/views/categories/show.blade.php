@if(session('success'))
<div class="bg-green-200 text-green-800 py-2 px-4 mb-4 rounded">
    {{ session('success') }}
</div>
@endif
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Category Details') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg p-6">
                <h3 class="text-lg font-semibold mb-4">{{ __('Category Information') }}</h3>

                <div class="mb-4">
                    <label class="block text-gray-600 dark:text-gray-300">{{ __('Category Name') }}</label>
                    <span>{{ $category->nama_kategori }}</span>
                </div>

                <div class="mt-4">
                    <a href="{{ route('categories.edit', $category->id) }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                        {{ __('Edit Category') }}
                    </a>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

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
            {{ __('Edit Category') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg p-6">
                <h3 class="text-lg font-semibold mb-4">{{ __('Category Information') }}</h3>

                <form action="{{ route('categories.update', $category->id) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="mb-4">
                        <label for="nama_kategori" class="block text-gray-600 dark:text-gray-300">{{ __('Category Name') }}</label>
                        <input type="text" name="nama_kategori" id="nama_kategori" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" value="{{ $category->nama_kategori }}" required>
                    </div>

                    <div class="mt-4">
                        <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded" onclick="event.preventDefault(); updateCategory();">
                            {{ __('Update Category') }}
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
        function updateCategory() {
            Swal.fire({
                title: 'Success!',
                text: 'Category updated successfully.',
                icon: 'success',
                timer: 2000,
                onClose: () => {
                    window.location.href = "{{ route('categories.index') }}";
                }
            });
        }
    </script>
</x-app-layout>

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg p-6">
                <h3 class="text-lg font-semibold mb-4">{{ __('Welcome,') }} {{ Auth::user()->name }}</h3>

                @if (Auth::user()->hasRole('Admin'))
                <!-- Tampilan untuk Admin -->
                <p>{{ __('You are logged in as an Admin.') }}</p>
                <p>{{ __('Admin-specific content goes here.') }}</p>

                <!-- Tombol-tombol akses fitur Admin -->
                <div class="mt-6">
                    <a href="{{ route('categories.index') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded inline-block">
                        {{ __('Manage Categories') }}
                    </a>
                    <a href="{{ route('products.index') }}" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded inline-block ml-4">
                        {{ __('Manage Products') }}
                    </a>
                    <a href="{{ route('users.index') }}" class="bg-indigo-500 hover:bg-indigo-700 text-white font-bold py-2 px-4 rounded inline-block ml-4">
                        {{ __('Manage Users') }}
                    </a>
                    <!-- Tambahkan tombol-tombol lainnya sesuai dengan rute fitur yang tersedia -->
                </div>
                @elseif (Auth::user()->hasRole('Pembeli'))
                <!-- Tampilan untuk Pembeli -->
                <p>{{ __('You are logged in as a Buyer.') }}</p>
                <p>{{ __('Buyer-specific content goes here.') }}</p>

                <div class="mt-6">
                    <a href="{{ route('pembeli.viewCart') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded inline-block">
                        <i class="fas fa-shopping-cart mr-2"></i>{{ __('View Cart') }}
                    </a>
                    <a href="{{ route('pembeli.orders.index') }}" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded inline-block ml-4">
                        <i class="fas fa-clipboard-list mr-2"></i>{{ __('View Orders') }}
                    </a>
                    <a href="{{ route('pembeli.index') }}" class="bg-purple-500 hover:bg-purple-700 text-white font-bold py-2 px-4 rounded inline-block">
                        <i class="fas fa-search mr-2"></i>{{ __('Explore Products') }}
                    </a>
                    <!-- Tambahkan tombol-tombol lainnya sesuai dengan rute fitur yang tersedia -->
                </div>

                @elseif (Auth::user()->hasRole('Penjual'))
                <!-- Tampilan untuk Penjual -->
                <p>{{ __('You are logged in as a Seller.') }}</p>
                <p>{{ __('Seller-specific content goes here.') }}</p>

                <!-- Tombol-tombol akses fitur Penjual -->
                <div class="mt-6">
                    <a href="{{ route('products.index') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded inline-block">
                        {{ __('Manage Products') }}
                    </a>
                    <a href="{{ route('categories.index') }}" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded inline-block ml-4">
                        {{ __('Manage Categories') }}
                    </a>
                    <a href="{{ route('penjual.orders') }}" class="bg-indigo-500 hover:bg-indigo-700 text-white font-bold py-2 px-4 rounded inline-block ml-4">
                        {{ __('View Orders') }}
                    </a>
                    <!-- Tambahkan tombol-tombol lainnya sesuai dengan rute fitur yang tersedia -->
                </div>
                @endif
            </div>
        </div>
    </div>
</x-app-layout>
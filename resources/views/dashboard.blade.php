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
                @elseif (Auth::user()->hasRole('Pembeli'))
                    <!-- Tampilan untuk Pembeli -->
                    <p>{{ __('You are logged in as a Buyer.') }}</p>
                    <p>{{ __('Buyer-specific content goes here.') }}</p>
                @elseif (Auth::user()->hasRole('Penjual'))
                    <!-- Tampilan untuk Penjual -->
                    <p>{{ __('You are logged in as a Seller.') }}</p>
                    <p>{{ __('Seller-specific content goes here.') }}</p>
                @endif
            </div>
        </div>
    </div>
</x-app-layout>

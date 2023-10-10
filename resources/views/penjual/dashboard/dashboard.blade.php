<!-- resources/views/penjual/dashboard.blade.php -->

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard Penjual') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg p-6">
                <h3 class="text-2xl font-semibold">Statistik Penjualan</h3>

                <!-- Chart Google -->
                <div id="revenueChart" style="height: 300px;"></div>

                <h3 class="text-2xl font-semibold mt-8">Pesanan</h3>

                <div class="grid grid-cols-2 gap-4">
                    <div class="bg-white dark:bg-gray-700 overflow-hidden shadow-lg sm:rounded-lg p-6">
                        <h4 class="text-xl font-semibold">Pesanan Belum Dikonfirmasi</h4>
                        <p class="text-gray-800 dark:text-gray-200 text-3xl">5</p>
                    </div>

                    <div class="bg-white dark:bg-gray-700 overflow-hidden shadow-lg sm:rounded-lg p-6">
                        <h4 class="text-xl font-semibold">Pesanan Dikonfirmasi</h4>
                        <p class="text-gray-800 dark:text-gray-200 text-3xl">15</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
        google.charts.load('current', {'packages':['corechart']});
        google.charts.setOnLoadCallback(drawChart);

        function drawChart() {
            var data = google.visualization.arrayToDataTable([
                ['Bulan', 'Pendapatan'],
                ['Januari',  1000],
                ['Februari',  1500],
                ['Maret',  2000],
                // Tambahkan data pendapatan untuk bulan-bulan berikutnya
            ]);

            var options = {
                title: 'Grafik Pendapatan Bulanan',
                curveType: 'function',
                legend: { position: 'bottom' }
            };

            var chart = new google.visualization.LineChart(document.getElementById('revenueChart'));

            chart.draw(data, options);
        }
    </script>
</x-app-layout>

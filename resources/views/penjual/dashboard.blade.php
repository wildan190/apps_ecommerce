<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg p-6">
                <!-- Informasi Pesanan -->
                <div class="mb-8">
                    <h3 class="text-2xl font-semibold mb-4">Informasi Pesanan</h3>
                    <div class="grid grid-cols-2 gap-4">
                        <div class="bg-blue-100 dark:bg-blue-700 p-4 rounded-lg">
                            <h4 class="text-lg font-semibold text-blue-800 dark:text-blue-200">Pesanan Belum Dikonfirmasi</h4>
                            <p class="text-gray-600 dark:text-gray-300">{{ $unconfirmedOrdersCount }}</p>
                        </div>
                        <div class="bg-green-100 dark:bg-green-700 p-4 rounded-lg">
                            <h4 class="text-lg font-semibold text-green-800 dark:text-green-200">Pesanan Telah Dikonfirmasi</h4>
                            <p class="text-gray-600 dark:text-gray-300">{{ $confirmedOrdersCount }}</p>
                        </div>
                    </div>
                </div>

                <!-- Grafik Pendapatan Harian -->
                <div class="mb-8">
                    <h3 class="text-2xl font-semibold mb-4">Grafik Pendapatan Harian</h3>
                    <div id="revenueChart" style="height: 300px;"></div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

<!-- Script untuk Google Charts -->
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<script type="text/javascript">
    google.charts.load('current', {'packages':['corechart']});
    google.charts.setOnLoadCallback(drawRevenueChart);

    function drawRevenueChart() {
        var data = google.visualization.arrayToDataTable([
            ['Tanggal', 'Pendapatan'],
            @foreach ($revenueData as $data)
                ['{{ $data->tanggal }}', {{ $data->pendapatan }}],
            @endforeach
        ]);

        var options = {
            title: 'Pendapatan Harian',
            curveType: 'function',
            legend: { position: 'bottom' }
        };

        var chart = new google.visualization.LineChart(document.getElementById('revenueChart'));

        chart.draw(data, options);
    }
</script>

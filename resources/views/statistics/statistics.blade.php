<x-app-layout>
    <x-slot name="header">
        <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Estadísticas') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
        @if ($insufficientData)
                    <div class="text-center text-red-600 font-semibold">
                        {{ $requiredMessage }}
                    </div>
        @else
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

                    <div class="bg-white p-6 rounded-lg shadow-md">
                        <h3 class="text-lg font-semibold text-gray-700 mb-4">Libros más solicitados</h3>
                        <div class="grid grid-cols-2 gap-4">
                            <div class="p-4 bg-green-200 rounded-lg shadow-sm text-center">
                                <p class="font-bold text-2xl">🥇</p>
                                <p class="font-semibold">{{ isset($topBooks[0]) ? $topBooks[0]->title : 'No disponible' }}</p>
                            </div>
                            <div class="p-4 bg-yellow-200 rounded-lg shadow-sm text-center">
                                <p class="font-bold text-2xl">🥈</p>
                                <p class="font-semibold">{{ isset($topBooks[1]) ? $topBooks[1]->title : 'No disponible' }}</p>
                            </div>
                        </div>
                        <div class="mt-4 p-4 bg-orange-200 rounded-lg shadow-sm text-center">
                            <p class="font-bold text-2xl">🥉</p>
                            <p class="font-semibold">{{ isset($topBooks[2]) ? $topBooks[2]->title : 'No disponible' }}</p>
                        </div>
                    </div>

                    <div class="bg-white p-6 rounded-lg shadow-md">
                        <h3 class="text-lg font-semibold text-gray-700 mb-4">Usuarios más activos</h3>
                        <div class="grid grid-cols-2 gap-4">
                            <div class="p-4 bg-green-200 rounded-lg shadow-sm text-center">
                                <p class="font-bold text-2xl">🥇</p>
                                <p class="font-semibold">{{ $topUsers[0]->name }}</p>
                            </div>
                            <div class="p-4 bg-yellow-200 rounded-lg shadow-sm text-center">
                                <p class="font-bold text-2xl">🥈</p>
                                <p class="font-semibold">{{ $topUsers[1]->name }}</p>
                            </div>
                        </div>
                        <div class="mt-4 p-4 bg-orange-200 rounded-lg shadow-sm text-center">
                            <p class="font-bold text-2xl">🥉</p>
                            <p class="font-semibold">{{ $topUsers[2]->name }}</p>
                        </div>
                    </div>
                </div>

            <div class="py-12">
                    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 bg-white p-6 rounded-lg shadow-md">
                        <h3 class="text-lg font-semibold text-gray-700 mb-4">Préstamos por Categoría</h3>

                        
                        <div id="chart-data" 
                            data-categories='@json($categories)' 
                            data-totals='@json($totals)'></div>

                        
                        <div id="chart" class="mt-6"></div>
                    </div>
                </div>
                <script>
                    document.addEventListener('DOMContentLoaded', function () {
                        var chartDataElement = document.getElementById('chart-data');
                        var categories = JSON.parse(chartDataElement.getAttribute('data-categories'));
                        var totals = JSON.parse(chartDataElement.getAttribute('data-totals'));
                        var options = {
                            chart: {
                                type: 'bar',
                                height: 350
                            },
                            series: [{
                                name: 'Préstamos por Categoría',
                                data: totals
                            }],
                            xaxis: {
                                categories: categories
                            },
                            title: {
                                text: 'Préstamos por Categoría de Libros',
                                align: 'center'
                            }
                        };
                        var chart = new ApexCharts(document.querySelector("#chart"), options);
                        chart.render();
                    });
                </script>
            
            @endif
        </div>
    </div>
</x-app-layout>
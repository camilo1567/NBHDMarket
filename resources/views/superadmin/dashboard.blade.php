@extends('layouts.superadmin.app')

@section('head')
    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
@endsection

@section('titulo')
    Dashboard
@endsection

@section('content')

    <div class="md:flex w-full">
        <a href="{{ route('superadmin.users.index') }}" class="flex bg-white p-4 m-2 md:w-1/3 rounded-lg">
            <div class="item-card-menu">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M15 19.128a9.38 9.38 0 002.625.372 9.337 9.337 0 004.121-.952 4.125 4.125 0 00-7.533-2.493M15 19.128v-.003c0-1.113-.285-2.16-.786-3.07M15 19.128v.106A12.318 12.318 0 018.624 21c-2.331 0-4.512-.645-6.374-1.766l-.001-.109a6.375 6.375 0 0111.964-3.07M12 6.375a3.375 3.375 0 11-6.75 0 3.375 3.375 0 016.75 0zm8.25 2.25a2.625 2.625 0 11-5.25 0 2.625 2.625 0 015.25 0z" />
                </svg>
            </div>
            <div>
                <p class="font-bold text-slate-700 text-lg">Usuarios</p>
                <p class="text-slate-700 opacity-50 font-bold text-sm">Cantidad: {{ count($users) }}</p>
            </div>
        </a>

        <a href="{{ route('superadmin.users.clientes') }}" class="flex bg-white p-4 m-2 md:w-1/3 rounded-lg">
            <div class="item-card-menu">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M15 19.128a9.38 9.38 0 002.625.372 9.337 9.337 0 004.121-.952 4.125 4.125 0 00-7.533-2.493M15 19.128v-.003c0-1.113-.285-2.16-.786-3.07M15 19.128v.106A12.318 12.318 0 018.624 21c-2.331 0-4.512-.645-6.374-1.766l-.001-.109a6.375 6.375 0 0111.964-3.07M12 6.375a3.375 3.375 0 11-6.75 0 3.375 3.375 0 016.75 0zm8.25 2.25a2.625 2.625 0 11-5.25 0 2.625 2.625 0 015.25 0z" />
                </svg>
            </div>
            <div>
                <p class="font-bold text-slate-700 text-lg">Clientes</p>
                <p class="text-slate-700 opacity-50 font-bold text-sm">Cantidad: {{ $users->filter(function ($user) {
                    return $user->hasRole('cliente');
                })->count() }}</p>
            </div>
        </a>

        <a href="{{ route('superadmin.users.negocios') }}" class="flex bg-white p-4 m-2 md:w-1/3 rounded-lg">
            <div class="item-card-menu">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M13.5 21v-7.5a.75.75 0 01.75-.75h3a.75.75 0 01.75.75V21m-4.5 0H2.36m11.14 0H18m0 0h3.64m-1.39 0V9.349m-16.5 11.65V9.35m0 0a3.001 3.001 0 003.75-.615A2.993 2.993 0 009.75 9.75c.896 0 1.7-.393 2.25-1.016a2.993 2.993 0 002.25 1.016c.896 0 1.7-.393 2.25-1.016a3.001 3.001 0 003.75.614m-16.5 0a3.004 3.004 0 01-.621-4.72L4.318 3.44A1.5 1.5 0 015.378 3h13.243a1.5 1.5 0 011.06.44l1.19 1.189a3 3 0 01-.621 4.72m-13.5 8.65h3.75a.75.75 0 00.75-.75V13.5a.75.75 0 00-.75-.75H6.75a.75.75 0 00-.75.75v3.75c0 .415.336.75.75.75z" />
                </svg>
            </div>
            <div>
                <p class="font-bold text-slate-700 text-lg">Negocios</p>
                <p class="text-slate-700 opacity-50 font-bold text-sm">Cantidad: {{ $users->filter(function ($user) {
                    return $user->hasRole('negocio');
                })->count() }}</p>
            </div>
        </a>

    </div>


    <div class="flex gap-1">
        <div class="w-full md:w-1/2">
            <div class="bg-white p-4 m-2 rounded-lg">
                <div class="flex justify-between mb-3">
                    <div class="flex items-center">
                        <div class="flex justify-center items-center">
                            <h5 class="text-xl font-bold leading-none text-gray-900 dark:text-white pr-1">Tickets</h5>
                        </div>
                    </div>
                </div>
                <div class="bg-gray-50 dark:bg-gray-700 p-3 rounded-lg">
                    <div class="grid grid-cols-4 gap-2 mb-2">
                        <dl class="bg-blue-50 dark:bg-gray-600 rounded-lg flex flex-col items-center justify-center h-[78px]">
                            <dt class="w-8 h-8 rounded-full bg-blue-100 dark:bg-gray-500 text-blue-600 dark:text-blue-300 text-sm font-medium flex items-center justify-center mb-1">{{ $tickets['abiertos'] }}</dt>
                            <dd class="text-blue-600 dark:text-blue-300 text-sm font-medium">Abiertos</dd>
                        </dl>
                        <dl class="bg-red-50 dark:bg-gray-600 rounded-lg flex flex-col items-center justify-center h-[78px]">
                            <dt class="w-8 h-8 rounded-full bg-red-100 dark:bg-gray-500 text-red-600 dark:text-red-300 text-sm font-medium flex items-center justify-center mb-1">{{ $tickets['pendientes'] }}</dt>
                            <dd class="text-red-600 dark:text-red-300 text-sm font-medium">Pendiente</dd>
                        </dl>
                        <dl class="bg-yellow-50 dark:bg-gray-600 rounded-lg flex flex-col items-center justify-center h-[78px]">
                            <dt class="w-8 h-8 rounded-full bg-yellow-100 dark:bg-gray-500 text-yellow-600 dark:text-yellow-300 text-sm font-medium flex items-center justify-center mb-1">{{ $tickets['enProgreso'] }}</dt>
                            <dd class="text-yellow-600 dark:text-yellow-300 text-sm font-medium">En progreso</dd>
                        </dl>
                        <dl class="bg-green-50 dark:bg-gray-600 rounded-lg flex flex-col items-center justify-center h-[78px]">
                            <dt class="w-8 h-8 rounded-full bg-green-100 dark:bg-gray-500 text-green-600 dark:text-green-300 text-sm font-medium flex items-center justify-center mb-1">{{ $tickets['cerrados'] }}</dt>
                            <dd class="text-green-600 dark:text-green-300 text-sm font-medium">Cerrado</dd>
                        </dl>
                    </div>
                </div>

                <!-- Bar Chart -->
                <div class="py-6" id="tickets-chart"></div>

                <div class="grid grid-cols-1 items-center border-gray-200 border-t dark:border-gray-700 justify-between">
                <div class="flex justify-start items-center pt-5">

                    <a
                    href="{{ route('superadmin.reportes.tickets') }}"
                    class="btn-primary">
                    <svg  class="w-5 h-5 ml-1.5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 14.25v-2.625a3.375 3.375 0 00-3.375-3.375h-1.5A1.125 1.125 0 0113.5 7.125v-1.5a3.375 3.375 0 00-3.375-3.375H8.25m3.75 9v6m3-3H9m1.5-12H5.625c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 00-9-9z" />
                    </svg>
                    Reporte
                    </a>
                </div>
                </div>
            </div>
        </div>

        <div  class="w-full md:w-1/2">
            <div class="bg-white p-4 m-2 rounded-lg">

                <div class="flex justify-between mb-3">
                    <div class="flex items-center">
                        <div class="flex justify-center items-center">
                            <h5 class="text-xl font-bold leading-none text-gray-900 dark:text-white pr-1">Usuarios</h5>
                        </div>
                    </div>
                </div>

                <!-- Line Chart -->
                <div class="py-6" id="users-chart"></div>

                <div class="grid grid-cols-1 items-center border-gray-200 border-t dark:border-gray-700 justify-between">
                  <div class="flex justify-between items-center pt-5">

                    <a
                    href="{{ route('superadmin.reportes.usuarios') }}"
                    class="btn-primary">
                    <svg  class="w-5 h-5 ml-1.5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 14.25v-2.625a3.375 3.375 0 00-3.375-3.375h-1.5A1.125 1.125 0 0113.5 7.125v-1.5a3.375 3.375 0 00-3.375-3.375H8.25m3.75 9v6m3-3H9m1.5-12H5.625c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 00-9-9z" />
                    </svg>
                    Reporte
                    </a>
                  </div>
                </div>
            </div>
        </div>
    </div>

@endsection


@section('scripts')

<script>
    // ApexCharts options and config
    window.addEventListener("load", function() {
      const getChartOptions = () => {
          return {
            series: [
                    {{ $tickets['cerrados'] }},
                    {{ $tickets['enProgreso'] }},
                    {{ $tickets['pendientes'] }},
                    {{ $tickets['abiertos'] }},
                ],
            colors: ["#4ade80", "#facc15", "#f87171","#60a5fa"],
            chart: {
              height: 420,
              width: "100%",
              type: "pie",
            },
            plotOptions: {
              pie: {
                labels: {
                  show: true,
                },
                size: "100%",
                dataLabels: {
                  offset: -25
                }
              },
            },
            stroke: {
              colors: ["white"],
              lineCap: "",
            },
            labels: ["Cerrado", "En progreso", "Pendiente","Abierto"],
            dataLabels: {
              enabled: true,
              style: {
                fontFamily: "Inter, sans-serif",
              },
            },
            legend: {
              position: "bottom",
              fontFamily: "Inter, sans-serif",
            },
            yaxis: {
              labels: {
                formatter: function (value) {
                  return value
                },
              },
            },
            xaxis: {
              labels: {
                formatter: function (value) {
                  return value  + "%"
                },
              },
              axisTicks: {
                show: false,
              },
              axisBorder: {
                show: false,
              },
            },
          }
        }

        if (document.getElementById("tickets-chart") && typeof ApexCharts !== 'undefined') {
          var chart = new ApexCharts(document.querySelector("#tickets-chart"), getChartOptions());
          chart.render();
        }
    });
</script>

<script>
    // ApexCharts options and config
    window.addEventListener("load", function() {
      const getChartOptions = () => {
          return {
            series: [
                {{ $users->filter(function ($user) {
                    return $user->hasRole('cliente');
                })->count() }},

                {{ $users->filter(function ($user) {
                    return $user->hasRole('negocio');
                })->count() }}

            ],
            colors: ["#1C64F2", "#16BDCA"],
            chart: {
              height: 420,
              width: "100%",
              type: "pie",
            },
            stroke: {
              colors: ["white"],
              lineCap: "",
            },
            plotOptions: {
              pie: {
                labels: {
                  show: true,
                },
                size: "100%",
                dataLabels: {
                  offset: -25
                }
              },
            },
            labels: ["Clientes", "Negocios"],
            dataLabels: {
              enabled: true,
              style: {
                fontFamily: "Inter, sans-serif",
              },
            },
            legend: {
              position: "bottom",
              fontFamily: "Inter, sans-serif",
            },
            yaxis: {
              labels: {
                formatter: function (value) {
                  return value
                },
              },
            },
            xaxis: {
              labels: {
                formatter: function (value) {
                  return value  + "%"
                },
              },
              axisTicks: {
                show: false,
              },
              axisBorder: {
                show: false,
              },
            },
          }
        }

        if (document.getElementById("users-chart") && typeof ApexCharts !== 'undefined') {
          const chart = new ApexCharts(document.getElementById("users-chart"), getChartOptions());
          chart.render();
        }
    });
</script>

@endsection

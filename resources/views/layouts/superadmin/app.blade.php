<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>
        <link rel="shortcut icon" href="{{ asset('img/marketplace/logo_marketplace.png') }}" />

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])

        @yield('head')
    </head>
    <body class="flex font-sans antialiased">

        <div class="hidden md:block w-[300px] bg-blue-400">
            @include('elements.superadmin.sidebar')
        </div>

        <div class="min-h-screen w-full bg-gray-100">

            @include('elements.superadmin.navigation')

            <div class="p-4">

                @yield('content')

            </div>

        </div>

        @yield('scripts')
    </body>
</html>
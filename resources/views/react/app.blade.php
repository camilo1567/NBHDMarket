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

        @viteReactRefresh
        <!-- Scripts -->
        @vite(['resources/css/app.css','resources/js/app.js','resources/js/react/main.jsx'])
    </head>
    <body class="flex flex-col font-sans antialiased">

        <div>
            @include('elements.negocio.navigation',['titulo' => $__env->yieldContent('titulo')])

            @include('elements.negocio.sidebar')
        </div>

        <div class="mt-4 sm:ml-64">
            <div class="mt-8 min-h-screen w-full bg-gray-100">
                <div class="py-6 px-4">

                    <div class="mt-2">
                        <div id="root"></div>
                    </div>

                </div>
            </div>
        </div>

    </body>
</html>

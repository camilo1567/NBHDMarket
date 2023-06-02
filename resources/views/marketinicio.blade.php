<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])

        <style>
            /* Estilos personalizados */
            .ml-navbar-search input[type="text"] {
              border-top-right-radius: 0;
              border-bottom-right-radius: 0;
            }

            .ml-navbar-search button {
              border-top-left-radius: 0;
              border-bottom-left-radius: 0;
            }

            .dropdown:hover .dropdown-menu {
                display: block;
            }
        </style>

    </head>
    <body class="antialiased">
        <header class="bg-blue-500 text-white py-4">
            <div class="container mx-auto flex items-center justify-between px-4">
              <div class="flex items-center space-x-4">
                <h1 class="text-2xl font-bold">Marketplace</h1>
                <form class="ml-navbar-search">
                  <input type="text" placeholder="Buscar productos" class="px-2 py-1 rounded-l">
                  <button type="submit" class="bg-white text-blue-500 px-3 py-1 rounded-r">Buscar</button>
                </form>
              </div>
              <nav>
                <ul class="flex space-x-4">
                  <li class="dropdown">
                    <a href="#" class="hover:text-gray-300">Categorías</a>
                    <ul class="absolute hidden bg-white shadow-md">
                      <li><a href="#" class="block px-4 py-2 text-gray-800 hover:bg-gray-200">Categoría 1</a></li>
                      <li><a href="#" class="block px-4 py-2 text-gray-800 hover:bg-gray-200">Categoría 2</a></li>
                      <li><a href="#" class="block px-4 py-2 text-gray-800 hover:bg-gray-200">Categoría 3</a></li>
                    </ul>
                  </li>
                  <li><a href="#" class="hover:text-gray-300">Ofertas</a></li>
                  <li><a href="#" class="hover:text-gray-300">Crear cuenta</a></li>
                  <li><a href="#" class="hover:text-gray-300">Iniciar sesión</a></li>
                </ul>
              </nav>
            </div>
          </header>

          <main class="container mx-auto mt-8">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
              <div class="bg-white rounded shadow p-4">
                <h2 class="text-xl font-bold mb-2">Producto 1</h2>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla tincidunt ante sit amet luctus posuere.</p>
              </div>
              <div class="bg-white rounded shadow p-4">
                <h2 class="text-xl font-bold mb-2">Producto 2</h2>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla tincidunt ante sit amet luctus posuere.</p>
              </div>
              <div class="bg-white rounded shadow p-4">
                <h2 class="text-xl font-bold mb-2">Producto 3</h2>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla tincidunt ante sit amet luctus posuere.</p>
              </div>
            </div>

          </main>

        <footer class="bg-gray-900 text-white py-4 mt-8">
            <div class="container mx-auto text-center">
                &copy; 2023 Marketplace. Todos los derechos reservados.
            </div>
        </footer>
    </body>
</html>

<nav class="bg-white py-2" x-data="{ isOpen: false }">
    <div class="container mx-auto px-2 flex items-center justify-between">
        <div class="flex items-center w-1/2">
            <img src="{{ asset('img/marketplace/logo_marketplace.png') }}" alt="Logo de NBHDMarket" class="w-[80px] h-[80px]">
            <h1 class="text-2xl font-bold ">NBHDMarket</h1>
        </div>

        <div class="flex items-center space-x-4 md:hidden">
            <button @click="isOpen = !isOpen" class="focus:outline-none">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
                </svg>
            </button>
        </div>

        <div class="space-x-4 hidden md:flex items-center ">
            <a href="{{ route('public.index') }}" class="hover:bg-blue-200 p-2 hover:text-white">Inicio</a>
            <a href="#" class="hover:bg-blue-200 p-2 hover:text-white">Tiendas</a>
            <a href="#" class="hover:bg-blue-200 p-2 hover:text-white">Productos</a>
            <a href="#" class="hover:bg-blue-200 p-2 hover:text-white">Ofertas</a>
            <a href="{{ route('login') }}" class="btn-default">Iniciar Sesión</a>
        </div>
    </div>

    <!-- Sidebar -->
    <div class="md:hidden" x-show="isOpen" @click.away="isOpen = false" class="fixed inset-y-0 left-0 w-64 bg-gray-800 text-white p-4 transition duration-300 ease-in-out transform translate-x-0">
        <ul class="space-y-2">
            <li class="border-b w-full border-solid border-black px-4 py-2 hover:bg-gray-200">
                <a href="{{ route('public.index') }}" >Inicio</a>
            </li>
            <li class="border-b w-full border-solid border-black px-4 py-2 hover:bg-gray-200">
                <a href="#">Tiendas</a>
            </li>
            <li class="border-b w-full border-solid border-black px-4 py-2 hover:bg-gray-200">
                <a href="#">Productos</a>
            </li>
            <li class="border-b w-full border-solid border-black px-4 py-2 hover:bg-gray-200">
                <a href="#">Ofertas</a>
            </li>
            <li class="border-b w-full border-solid border-black px-4 py-2 hover:bg-gray-200">
                <a href="{{ route('login') }}">Iniciar Sesión</a>
            </li>
        </ul>
    </div>
</nav>

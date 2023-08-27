
<nav class="bg-white border-gray-200 dark:bg-gray-900">
    <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-4">
        <a href="{{ route('public.index') }}" class="flex items-center">
            <img src="{{ asset('img/marketplace/logo_marketplace.png') }}" class="w-[45px] h-[45px]" alt="NBHDMarket Logo" />
            <span class="self-center text-2xl font-semibold whitespace-nowrap dark:text-white">NBHDMarket</span>
        </a>
        <button data-collapse-toggle="navbar-default" type="button" class="inline-flex items-center p-2 w-10 h-10 justify-center text-sm text-gray-500 rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400  dark:focus:ring-gray-600" aria-controls="navbar-default" aria-expanded="false">
            <span class="sr-only">Open main menu</span>
            <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 17 14">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 1h15M1 7h15M1 13h15"/>
            </svg>
        </button>
        <div class="hidden w-full md:block md:w-auto" id="navbar-default">
        <ul class="font-medium flex flex-col md:items-center p-4 md:p-0 mt-4 border border-gray-100 rounded-lg bg-gray-50 md:flex-row md:space-x-8 md:mt-0 md:border-0 md:bg-white dark:bg-gray-800 md:dark:bg-gray-900 dark:border-gray-700">
            <li>
                <a href="{{ route('public.index') }}" class="block py-2 pl-3 pr-4 text-white bg-blue-700 rounded md:bg-transparent md:text-blue-700 md:p-0 md:dark:text-blue-500" aria-current="page">Inicio</a>
            </li>
            <li>
                <a href="#" class="block py-2 pl-3 pr-4 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0   ">About</a>
            </li>
            <li>
                <a href="#" class="block py-2 pl-3 pr-4 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0   ">Services</a>
            </li>
            <li>
                <a href="#" class="block py-2 pl-3 pr-4 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0   ">Pricing</a>
            </li>
            <li>
                <a href="{{ route('login') }}" class="block py-2 pl-3 pr-4 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0    md:text-white md:rounded-lg md:bg-blue-500 md:hover:bg-blue-400 md:p-2">Iniciar Sesion</a>
            </li>
        </ul>
        </div>
    </div>
</nav>

<!--<nav class="bg-white py-2" x-data="{ isOpen: false }">
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
</nav>-->

<nav class="fixed top-0 z-50 w-full bg-white border-b border-gray-200 dark:bg-gray-800 dark:border-gray-700">
    <div class="px-3 py-3 lg:px-5 lg:pl-3">
        <div class="flex items-center justify-between">
            <div class="flex items-center justify-start">
                <button data-drawer-target="logo-sidebar" data-drawer-toggle="logo-sidebar" aria-controls="logo-sidebar" type="button" class="inline-flex items-center p-2 text-sm text-gray-500 rounded-lg sm:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600">
                    <span class="sr-only">Open sidebar</span>
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 5.25h16.5m-16.5 4.5h16.5m-16.5 4.5h16.5m-16.5 4.5h16.5" />
                    </svg>
                </button>
                <a href="{{ route('dashboard') }}" class="flex ml-2 md:mr-24">
                    <img src="{{ asset('img/marketplace/logo_marketplace.png') }}" class="w-[45px] h-[45px]" alt="NBHDMarket Logo" />
                    <span class="self-center text-xl font-semibold sm:text-2xl whitespace-nowrap dark:text-white">NBHDMarket</span>
                </a>
            </div>
            @include('elements.negocio.menu')
        </div>
    </div>
</nav>

<!--<nav class="bg-white py-3">
    <div class="flex items-center justify-between w-full px-4 py-1 mx-auto flex-wrap-inherit">

        <button class="text-slate-500 hover:text-slate-600 lg:hidden" @click.stop="sidebarOpen = !sidebarOpen" aria-controls="sidebar" :aria-expanded="sidebarOpen" aria-expanded="false">
            <span class="sr-only">Open sidebar</span>
            <svg class="w-6 h-6 fill-current" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                <rect x="4" y="5" width="16" height="2"></rect>
                <rect x="4" y="11" width="16" height="2"></rect>
                <rect x="4" y="17" width="16" height="2"></rect>
            </svg>
        </button>
        <nav>

            <ol class="flex flex-wrap pt-1 mr-12 bg-transparent rounded-lg sm:mr-16">
                <li class="text-sm leading-normal">
                    <a class="opacity-50 text-slate-700" href="#">Pages</a>
                </li>
                <li class="text-sm pl-2 capitalize leading-normal text-slate-700 before:float-left before:pr-2 before:text-gray-600 before:content-['/']" aria-current="page">{{ $titulo }}</li>
            </ol>
            <h6 class="mb-0 font-bold capitalize">{{ $titulo }}</h6>
        </nav>

        <div class="flex flex-row items-center justify-end gap-2 pl-0 mb-0 list-none md-max:w-full text-slate-500">

            <div class="relative" x-data="{ dropdownOpen: false }" @click.outside="dropdownOpen = false">
                <a class="flex items-center gap-4" href="#" @click.prevent="dropdownOpen = ! dropdownOpen">
                <span class="hidden lg:block text-right">
                    <span class="block font-medium text-sm text-black">{{Auth::user()->name }}</span>
                    <span class="block text-xs">{{Auth::user()->roles[0]->name }}</span>
                </span>

                <span class="w-12 h-12 rounded-full">

                    @role('superadmin')

                        <img src="{{ asset('img/marketplace/logo_marketplace.png') }}" alt="Logo">

                    @else

                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-11 h-11 text-grey-500">
                            <path fill-rule="evenodd" d="M18.685 19.097A9.723 9.723 0 0021.75 12c0-5.385-4.365-9.75-9.75-9.75S2.25 6.615 2.25 12a9.723 9.723 0 003.065 7.097A9.716 9.716 0 0012 21.75a9.716 9.716 0 006.685-2.653zm-12.54-1.285A7.486 7.486 0 0112 15a7.486 7.486 0 015.855 2.812A8.224 8.224 0 0112 20.25a8.224 8.224 0 01-5.855-2.438zM15.75 9a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0z" clip-rule="evenodd" />
                        </svg>

                    @endrole

                </span>

                <svg :class="dropdownOpen && 'rotate-180'"
                    class="fill-current hidden sm:block" width="12" height="8"
                    viewBox="0 0 12 8" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd" clip-rule="evenodd"
                    d="M0.410765 0.910734C0.736202 0.585297 1.26384 0.585297 1.58928 0.910734L6.00002 5.32148L10.4108 0.910734C10.7362 0.585297 11.2638 0.585297 11.5893 0.910734C11.9147 1.23617 11.9147 1.76381 11.5893 2.08924L6.58928 7.08924C6.26384 7.41468 5.7362 7.41468 5.41077 7.08924L0.410765 2.08924C0.0853277 1.76381 0.0853277 1.23617 0.410765 0.910734Z"
                    fill="" />
                </svg>
                </a>


                <div x-show="dropdownOpen"
                class="flex flex-col shadow-default rounded-sm border border-stroke dark:border-strokedark bg-white dark:bg-boxdark w-[200px] absolute right-0 mt-4">

                <button
                    class="font-medium text-sm lg:text-base flex items-center gap-3.5 ease-in-out duration-300 hover:text-blue-600 py-4 px-6">

                    <form method="POST" action="{{ route('logout') }}" class="flex">
                        @csrf

                        <svg class="fill-current" width="22" height="22" viewBox="0 0 22 22" fill="none"
                        xmlns="http://www.w3.org/2000/svg">
                            <path
                            d="M15.5375 0.618744H11.6531C10.7594 0.618744 10.0031 1.37499 10.0031 2.26874V4.64062C10.0031 5.05312 10.3469 5.39687 10.7594 5.39687C11.1719 5.39687 11.55 5.05312 11.55 4.64062V2.23437C11.55 2.16562 11.5844 2.13124 11.6531 2.13124H15.5375C16.3625 2.13124 17.0156 2.78437 17.0156 3.60937V18.3562C17.0156 19.1812 16.3625 19.8344 15.5375 19.8344H11.6531C11.5844 19.8344 11.55 19.8 11.55 19.7312V17.3594C11.55 16.9469 11.2062 16.6031 10.7594 16.6031C10.3125 16.6031 10.0031 16.9469 10.0031 17.3594V19.7312C10.0031 20.625 10.7594 21.3812 11.6531 21.3812H15.5375C17.2219 21.3812 18.5625 20.0062 18.5625 18.3562V3.64374C18.5625 1.95937 17.1875 0.618744 15.5375 0.618744Z"
                            fill="" />
                            <path
                            d="M6.05001 11.7563H12.2031C12.6156 11.7563 12.9594 11.4125 12.9594 11C12.9594 10.5875 12.6156 10.2438 12.2031 10.2438H6.08439L8.21564 8.07813C8.52501 7.76875 8.52501 7.2875 8.21564 6.97812C7.90626 6.66875 7.42501 6.66875 7.11564 6.97812L3.67814 10.4844C3.36876 10.7938 3.36876 11.275 3.67814 11.5844L7.11564 15.0906C7.25314 15.2281 7.45939 15.3312 7.66564 15.3312C7.87189 15.3312 8.04376 15.2625 8.21564 15.125C8.52501 14.8156 8.52501 14.3344 8.21564 14.025L6.05001 11.7563Z"
                            fill="" />
                        </svg>

                        <a class="group relative font-medium flex items-center gap-2.5 rounded-md ease-in-out  px-4 "
                        onclick="event.preventDefault();
                                    this.closest('form').submit();">
                            Cerrar sesion
                        </a>

                    </form>
                </button>
                </div>

            </div>

        </div>
    </div>
</nav>-->


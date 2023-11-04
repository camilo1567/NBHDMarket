<div class="flex items-center">
    <div class="flex items-center ml-3">
        <div>
            <button type="button" class="flex text-sm bg-gray-100 rounded-full focus:ring-4 focus:ring-gray-300 dark:focus:ring-gray-600" aria-expanded="false" data-dropdown-toggle="dropdown-user">
            <span class="sr-only">Open user menu</span>

                @if (Auth::user()->settings->foto_perfil)

                    <img class="w-8 h-8 rounded-full" src="{{ asset('storage/'.Auth::user()->settings->foto_perfil) }}" alt="logo">

                @else
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5 p-1 text-slate-300">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 6a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0zM4.501 20.118a7.5 7.5 0 0114.998 0A17.933 17.933 0 0112 21.75c-2.676 0-5.216-.584-7.499-1.632z" />
                    </svg>
                    {{-- <img src="{{ asset('img/marketplace/logo_marketplace.png') }}" class="w-[45px] h-[45px]" alt="NBHDMarket Logo" /> --}}
                @endif
            </button>
        </div>
        <div class="z-50 hidden my-4 text-base list-none bg-white divide-y divide-gray-100 rounded shadow dark:bg-gray-700 dark:divide-gray-600" id="dropdown-user">
            <div class="px-4 py-3" role="none">
                <p class="text-sm text-gray-900 dark:text-white" role="none">
                    {{Auth::user()->name }}
                </p>
                <p class="text-sm font-medium text-gray-900 truncate dark:text-gray-300" role="none">
                    {{Auth::user()->email }}
                </p>
            </div>
            <ul class="py-1" role="none">
                <li>
                    <a href="{{ route('dashboard') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:text-gray-300 dark:hover:bg-gray-600 dark:hover:text-white" role="menuitem">Dashboard</a>
                </li>
                <li>
                    <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:text-gray-300 dark:hover:bg-gray-600 dark:hover:text-white" role="menuitem">Ajustes</a>
                </li>
                <li>
                    <form method="POST" action="{{ route('logout') }}" class="block cursor-pointer px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:text-gray-300 dark:hover:bg-gray-600 dark:hover:text-white" role="menuitem">
                        @csrf
                        <a onclick="event.preventDefault(); this.closest('form').submit();">Cerrar Sesion</a>
                    </form>
                </li>
            </ul>
        </div>
    </div>
</div>

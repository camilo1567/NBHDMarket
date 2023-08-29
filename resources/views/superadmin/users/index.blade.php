@extends('layouts.superadmin.app')

@section('titulo')
    Usuarios
@endsection

@section('content')

<div class="flex flex-wrap mt-2">
    <div class="flex-none w-full max-w-full bg-white p-2 rounded-lg">

        <div class="md:flex items-center justify-between py-2">

            @if (request()->routeIs('superadmin.users.index') )
                <div class="py-2">
                    <div class="flex justify-start">
                        <a href="{{ route('superadmin.users.create') }}" class="btn-primary">

                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-5 h-5">
                                <path fill-rule="evenodd" d="M12 3.75a.75.75 0 01.75.75v6.75h6.75a.75.75 0 010 1.5h-6.75v6.75a.75.75 0 01-1.5 0v-6.75H4.5a.75.75 0 010-1.5h6.75V4.5a.75.75 0 01.75-.75z" clip-rule="evenodd" />
                            </svg>

                            Nuevo

                        </a>
                    </div>
                </div>
            @endif

            <form class="w-full md:w-[70%]" method="GET">
                <div class="relative">
                    <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                        <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z"/>
                        </svg>
                    </div>
                    <input value='{{ request()->q }}' name="q" class="block w-full p-4 pl-10 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Buscar por Nombre o Email...">
                    <button type="submit" class="text-white absolute right-2.5 bottom-2.5 bg-blue-200 hover:bg-blue-300 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Buscar</button>
                </div>
            </form>
        </div>

        <div class="flex flex-col bg-white rounded-lg">

            <div class="flex-auto px-0 pt-0 pb-2">
                <div class="p-0 overflow-x-auto">
                    <table class="items-center w-full  align-top border-gray-200 text-slate-500">
                        <thead class="align-bottom">
                            <tr>
                                <th class="px-6 py-3 font-bold text-left uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-sm border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">Nombre</th>
                                <th class="px-6 py-3 font-bold text-left uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-sm border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">Email</th>
                                <th class="px-6 py-3 font-bold text-center uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-sm border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">Rol</th>
                                <th class="px-6 py-3 font-bold text-center uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-sm border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">Fecha de Creacion</th>
                                <th class="px-6 py-3 font-bold text-center uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-sm border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70"></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $user)
                                <tr>
                                    <td class="px-6 py-3 align-middle bg-transparent border-b whitespace-nowrap shadow-transparent">
                                        {{ $user->name }}
                                    </td>

                                    <td class="px-6 py-3 align-middle bg-transparent border-b whitespace-nowrap shadow-transparent">
                                        {{ $user->email }}
                                    </td>

                                    <td class="px-6 py-3 align-middle text-center bg-transparent border-b whitespace-nowrap shadow-transparent">
                                    {{ $user->roles[0]->name }}
                                    </td>

                                    <td class="px-6 py-3 align-middle text-center bg-transparent border-b whitespace-nowrap shadow-transparent">
                                        {{ $user->created_at->format('d/m/Y') }}
                                    </td>

                                    <td class="px-6 py-3 align-middle bg-transparent border-b whitespace-nowrap shadow-transparent">
                                        <div class="flex gap-2">
                                            <a href="{{ route('superadmin.users.edit',$user) }}" class="flex items-center text-blue-500 px-2">
                                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="w-5 h-5">
                                                    <path d="M5.433 13.917l1.262-3.155A4 4 0 017.58 9.42l6.92-6.918a2.121 2.121 0 013 3l-6.92 6.918c-.383.383-.84.685-1.343.886l-3.154 1.262a.5.5 0 01-.65-.65z" />
                                                    <path d="M3.5 5.75c0-.69.56-1.25 1.25-1.25H10A.75.75 0 0010 3H4.75A2.75 2.75 0 002 5.75v9.5A2.75 2.75 0 004.75 18h9.5A2.75 2.75 0 0017 15.25V10a.75.75 0 00-1.5 0v5.25c0 .69-.56 1.25-1.25 1.25h-9.5c-.69 0-1.25-.56-1.25-1.25v-9.5z" />
                                                </svg>

                                                Editar
                                            </a>

                                            {{ Aire::open()->route('superadmin.users.destroy', $user) }}
                                                <button type="submit" class="flex items-center text-red-500 px-2" onclick="return confirm('¿Seguro que desea eliminar este usuario?')">
                                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="w-5 h-5">
                                                        <path fill-rule="evenodd" d="M8.75 1A2.75 2.75 0 006 3.75v.443c-.795.077-1.584.176-2.365.298a.75.75 0 10.23 1.482l.149-.022.841 10.518A2.75 2.75 0 007.596 19h4.807a2.75 2.75 0 002.742-2.53l.841-10.52.149.023a.75.75 0 00.23-1.482A41.03 41.03 0 0014 4.193V3.75A2.75 2.75 0 0011.25 1h-2.5zM10 4c.84 0 1.673.025 2.5.075V3.75c0-.69-.56-1.25-1.25-1.25h-2.5c-.69 0-1.25.56-1.25 1.25v.325C8.327 4.025 9.16 4 10 4zM8.58 7.72a.75.75 0 00-1.5.06l.3 7.5a.75.75 0 101.5-.06l-.3-7.5zm4.34.06a.75.75 0 10-1.5-.06l-.3 7.5a.75.75 0 101.5.06l.3-7.5z" clip-rule="evenodd" />
                                                    </svg>
                                                    Eliminar
                                                </button>
                                            {{ Aire::close() }}
                                        </div>
                                    </td>

                                </tr>
                            @endforeach
                        </tbody>
                    </table>

                    <div class="p-2">
                        {{ $users->links()  }}
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>

@endsection

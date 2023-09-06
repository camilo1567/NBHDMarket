@extends('layouts.superadmin.app')

@section('titulo')
    Usuarios
@endsection

@section('content')

    <div class="container-template">
        <div class="md:flex items-center justify-between py-2">
            <form class="w-full md:w-1/2" method="GET">
                <div class="flex items-center">
                    <div class="p-2 text-gray-900 border border-gray-300 rounded-l-lg bg-gray-50">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-5.197-5.197m0 0A7.5 7.5 0 105.196 5.196a7.5 7.5 0 0010.607 10.607z" />
                        </svg>
                    </div>
                    <input value='{{ request()->q }}' name="q" class="block w-full p-2 text-sm text-gray-900 border border-gray-300 rounded-r-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500" placeholder="Buscar por Nombre o Email...">
                </div>
            </form>

            @if (request()->routeIs('superadmin.users.index') )
                <div class="py-2">
                    <div class="flex justify-start">
                        <a href="{{ route('superadmin.users.create') }}" class="btn-primary">
                            Nuevo
                        </a>
                    </div>
                </div>
            @endif

        </div>

        <div class="container-table">
            <div class="container-table-div">
                <table class="table-template">
                    <thead>
                        <tr>
                            <th class="text-left th-template">Usuario</th>
                            <th class="text-center th-template">Rol</th>
                            <th class="text-center th-template">Fecha de Creacion</th>
                            <th class="text-center th-template"></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $user)
                        @if ($user->id == 2)
                            @continue
                        @endif
                            <tr>
                                <td class="td-template">
                                    <div class="flex-shrink-0">
                                        @if ($user->settings->foto_perfil)
                                            <img class="w-10 h-10 rounded-full" src="{{ asset('storage/'.$user->settings->foto_perfil) }}" alt="Neil image">
                                        @else
                                            <svg  class="w-10 h-10 p-1 bg-gray-100 rounded-full" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 6a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0zM4.501 20.118a7.5 7.5 0 0114.998 0A17.933 17.933 0 0112 21.75c-2.676 0-5.216-.584-7.499-1.632z" />
                                            </svg>
                                        @endif
                                    </div>
                                    <div class="flex-1 min-w-0">
                                        <p class="text-sm font-medium text-gray-900 truncate dark:text-white">
                                            {{ $user->name }}
                                        </p>
                                        <p class="text-sm text-gray-500 truncate dark:text-gray-400">
                                            {{ $user->email }}
                                        </p>
                                    </div>
                                </td>

                                <td class="text-center td-template">
                                    {{ $user->roles[0]->name }}
                                </td>

                                <td class="text-center td-template">
                                    {{ $user->created_at->sub(new DateInterval('PT5H'))->format('d/m/Y') }}
                                </td>

                                <td class="td-template">
                                    <div class="flex justify-end gap-2">
                                        <a href="{{ route('superadmin.users.edit',$user) }}" class="btn-primary">
                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="w-5 h-5">
                                                <path d="M5.433 13.917l1.262-3.155A4 4 0 017.58 9.42l6.92-6.918a2.121 2.121 0 013 3l-6.92 6.918c-.383.383-.84.685-1.343.886l-3.154 1.262a.5.5 0 01-.65-.65z" />
                                                <path d="M3.5 5.75c0-.69.56-1.25 1.25-1.25H10A.75.75 0 0010 3H4.75A2.75 2.75 0 002 5.75v9.5A2.75 2.75 0 004.75 18h9.5A2.75 2.75 0 0017 15.25V10a.75.75 0 00-1.5 0v5.25c0 .69-.56 1.25-1.25 1.25h-9.5c-.69 0-1.25-.56-1.25-1.25v-9.5z" />
                                            </svg>

                                            Editar
                                        </a>

                                        {{ Aire::open()->route('superadmin.users.destroy', $user) }}
                                            <button type="submit" class="btn-secondary" onclick="return confirm('¿Seguro que desea eliminar este usuario?')">
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

@endsection

@extends('layouts.negocio.app')

@section('titulo')
    Publicidades
@endsection

@section('content')

    <div class="py-2">
        <div class="flex justify-start">
            <a href="{{ route('negocio.publicities.create') }}" class="btn-primary">
                Nuevo
            </a>
        </div>
    </div>

    <div class="container-template">
        <div class="p-0 overflow-y-auto grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-3 gap-4">
            @if ($publicities->isEmpty())
                    <div class="p-4">
                        No hay publicidades registradas
                    </div>
            @endif
            @foreach ($publicities as $publicity)
                <div class="max-w-sm bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
                    <a href="{{ route('negocio.publicities.edit',$publicity) }}" class="flex justify-center">
                        <img class="rounded-t-lg h-[250px]" src="{{ asset('storage/'.$publicity->imagen) }}" alt="{{ $publicity->nombre }}" />
                    </a>
                    <div class="p-5">
                        <div>
                            <h5 class="mb-2 text-xl font-bold tracking-tight text-gray-900 dark:text-white">{{ $publicity->nombre }}</h5>
                            <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">{{ $publicity->descripcion }}</p>
                        </div>
                        <div class="flex gap-2">
                            {{-- @if ($publicity->status == 0)
                                {{ Aire::open()->route('negocio.publicities.habilitar', $publicity) }}
                                    <button type="submit" class="btn-info" >
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M2.036 12.322a1.012 1.012 0 010-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178z" />
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                        </svg>

                                        Habilitar
                                    </button>
                                {{ Aire::close() }}
                            @endif
                            @if ($publicity->status == 1)
                                {{ Aire::open()->route('superadmin.publicities.deshabilitar', $publicity) }}
                                    <button type="submit" class="btn-warning" >
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M3.98 8.223A10.477 10.477 0 001.934 12C3.226 16.338 7.244 19.5 12 19.5c.993 0 1.953-.138 2.863-.395M6.228 6.228A10.45 10.45 0 0112 4.5c4.756 0 8.773 3.162 10.065 7.498a10.523 10.523 0 01-4.293 5.774M6.228 6.228L3 3m3.228 3.228l3.65 3.65m7.894 7.894L21 21m-3.228-3.228l-3.65-3.65m0 0a3 3 0 10-4.243-4.243m4.242 4.242L9.88 9.88" />
                                        </svg>

                                        Desabilitar
                                    </button>
                                {{ Aire::close() }}
                            @endif --}}
                            {{-- <a href="#" class="btn-warning">

                            </a>
                            <a href="#" class="btn-secondary">

                            </a> --}}

                            <a href="{{ route('negocio.publicities.edit',$publicity) }}" class="btn-primary ">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="w-5 h-5">
                                    <path d="M5.433 13.917l1.262-3.155A4 4 0 017.58 9.42l6.92-6.918a2.121 2.121 0 013 3l-6.92 6.918c-.383.383-.84.685-1.343.886l-3.154 1.262a.5.5 0 01-.65-.65z" />
                                    <path d="M3.5 5.75c0-.69.56-1.25 1.25-1.25H10A.75.75 0 0010 3H4.75A2.75 2.75 0 002 5.75v9.5A2.75 2.75 0 004.75 18h9.5A2.75 2.75 0 0017 15.25V10a.75.75 0 00-1.5 0v5.25c0 .69-.56 1.25-1.25 1.25h-9.5c-.69 0-1.25-.56-1.25-1.25v-9.5z" />
                                </svg>

                                Editar
                            </a>

                            {{ Aire::open()->route('negocio.publicities.destroy', $publicity) }}
                                <button type="submit" class="btn-secondary" onclick="return confirm('¿Seguro que desea eliminar esta publicidad?')">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="w-5 h-5">
                                        <path fill-rule="evenodd" d="M8.75 1A2.75 2.75 0 006 3.75v.443c-.795.077-1.584.176-2.365.298a.75.75 0 10.23 1.482l.149-.022.841 10.518A2.75 2.75 0 007.596 19h4.807a2.75 2.75 0 002.742-2.53l.841-10.52.149.023a.75.75 0 00.23-1.482A41.03 41.03 0 0014 4.193V3.75A2.75 2.75 0 0011.25 1h-2.5zM10 4c.84 0 1.673.025 2.5.075V3.75c0-.69-.56-1.25-1.25-1.25h-2.5c-.69 0-1.25.56-1.25 1.25v.325C8.327 4.025 9.16 4 10 4zM8.58 7.72a.75.75 0 00-1.5.06l.3 7.5a.75.75 0 101.5-.06l-.3-7.5zm4.34.06a.75.75 0 10-1.5-.06l-.3 7.5a.75.75 0 101.5.06l.3-7.5z" clip-rule="evenodd" />
                                    </svg>
                                    Eliminar
                                </button>
                            {{ Aire::close() }}
                        </div>

                    </div>
                </div>
            @endforeach

        </div>

    </div>

@endsection

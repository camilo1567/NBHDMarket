@extends('layouts.public.app')

@section('content')

    <div class=" p-4">
        @foreach ($negocios as $negocio)
            <a href="{{ route('public.negocio',$negocio) }}">
                <div class="bg-white rounded-lg flex items-center gap-4 overflow-hidden shadow-md p-4 mb-4">
                    @if ($negocio->settings->foto_perfil)
                        <div class="w-[30%] flex justify-center">
                            <img class="h-[200px] w-[200px]" src="{{ asset('storage/'.$negocio->settings->foto_perfil )}}" alt="{{ $negocio->name }}">
                        </div>
                    @else
                        <div class="flex justify-center ">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-12 h-12">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M13.5 21v-7.5a.75.75 0 01.75-.75h3a.75.75 0 01.75.75V21m-4.5 0H2.36m11.14 0H18m0 0h3.64m-1.39 0V9.349m-16.5 11.65V9.35m0 0a3.001 3.001 0 003.75-.615A2.993 2.993 0 009.75 9.75c.896 0 1.7-.393 2.25-1.016a2.993 2.993 0 002.25 1.016c.896 0 1.7-.393 2.25-1.016a3.001 3.001 0 003.75.614m-16.5 0a3.004 3.004 0 01-.621-4.72L4.318 3.44A1.5 1.5 0 015.378 3h13.243a1.5 1.5 0 011.06.44l1.19 1.189a3 3 0 01-.621 4.72m-13.5 8.65h3.75a.75.75 0 00.75-.75V13.5a.75.75 0 00-.75-.75H6.75a.75.75 0 00-.75.75v3.75c0 .415.336.75.75.75z" />
                            </svg>
                        </div>
                    @endif
                    <div class="p-4 w-[70%]">
                        <h2 class="font-bold uppercase text-3xl mb-2">{{ $negocio->name }}</h2>
                        <p class="text-md text-gray-700 mb-4">{{ $negocio->settings->descripcion }}</p>
                        <p class="text-lg mb-4"><strong>Direccion: </strong>{{ $negocio->settings->direccion }}</p>

                        <ul class="text-gray-500 dark:text-gray-400 font-medium grid md:grid-cols-2">
                            @if ($negocio->settings->instagram)
                                <li class="mb-2 flex gap-2 align-middle"><svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-brand-instagram" width="20" height="20" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                    <path d="M4 4m0 4a4 4 0 0 1 4 -4h8a4 4 0 0 1 4 4v8a4 4 0 0 1 -4 4h-8a4 4 0 0 1 -4 -4z"></path>
                                    <path d="M12 12m-3 0a3 3 0 1 0 6 0a3 3 0 1 0 -6 0"></path>
                                    <path d="M16.5 7.5l0 .01"></path>
                                </svg>{{ $negocio->settings->instagram }}</li>
                            @endif

                            @if ($negocio->settings->facebook)
                                <li class="mb-2 flex gap-2 align-middle"> <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-brand-facebook" width="20" height="20" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                    <path d="M7 10v4h3v7h4v-7h3l1 -4h-4v-2a1 1 0 0 1 1 -1h3v-4h-3a5 5 0 0 0 -5 5v2h-3"></path>
                                </svg>{{  $negocio->settings->facebook }}</li>
                            @endif

                            @if ($negocio->settings->twitter)
                                <li class="mb-2 flex gap-2 align-middle"> <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-brand-x" width="20" height="20" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                    <path d="M4 4l11.733 16h4.267l-11.733 -16z"></path>
                                    <path d="M4 20l6.768 -6.768m2.46 -2.46l6.772 -6.772"></path>
                                </svg>{{ $negocio->settings->twitter }}</li>
                            @endif

                        </ul>
                    </div>
                </div>
            </a>
        @endforeach
    </div>

@endsection

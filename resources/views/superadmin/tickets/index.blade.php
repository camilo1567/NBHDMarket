@extends('layouts.superadmin.app')

@section('titulo')
    Tickets
@endsection

@section('content')

<div class="flex flex-wrap mt-2">
    <div class="flex-none w-full max-w-full bg-white p-2 rounded-lg">

        <div class="py-2">

                {{-- <div class="flex justify-start">
                    <a href="{{ route('superadmin.tickets.create') }}" class="btn-primary">

                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-5 h-5">
                            <path fill-rule="evenodd" d="M12 3.75a.75.75 0 01.75.75v6.75h6.75a.75.75 0 010 1.5h-6.75v6.75a.75.75 0 01-1.5 0v-6.75H4.5a.75.75 0 010-1.5h6.75V4.5a.75.75 0 01.75-.75z" clip-rule="evenodd" />
                        </svg>

                        Nuevo

                    </a>
                </div> --}}
                <form method="get" class="flex items-center justify-between">

                    <div class="">
                        {{ Aire::select([4 => 'Todos',0 => 'Abierto', 1 => 'Pendiente', 2 => 'En progreso', 3 => 'Cerrado'], 'q','Estado')->name('q')->value(request('q')) }}
                    </div>
                    <button class="btn-primary mt-3" type="submit">
                        Buscar
                    </button>
                </form>

        </div>

        <div class="flex flex-col bg-white rounded-lg">

            <div class="flex-auto px-0 pt-0 pb-2">
                <div class="p-0 overflow-y-auto grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-3 gap-4">

                    @foreach ($tickets as $ticket)
                        <div class="bg-slate-100 rounded-lg shadow-lg p-6 ">
                            <h2 class="text-lg font-semibold mb-2">Ticket de Soporte #{{ $ticket->id }}</h2>
                            <p class="text-gray-600 mb-4">Fecha: {{ $ticket->created_at->sub(new DateInterval('PT5H'))->format('d/m/Y') }}</p>
                            <p class="text-gray-800 mb-4">
                                Asunto: {{ $ticket->asunto  }}
                            </p>
                            <p class="text-gray-800 mb-4">
                                Archivo: {{ $ticket->file ? 'Si' : 'No'  }}
                            </p>
                            <div class="flex items-center justify-between">
                                <span class="text-gray-500">
                                    Estado:
                                    @switch($ticket->status)
                                        @case(0)
                                            Abierto
                                            @break
                                        @case(1)
                                            Pendiente
                                            @break
                                        @case(2)
                                            En progreso
                                            @break

                                        @case(3)
                                            Cerrado
                                            @break

                                        @default
                                            Abierto
                                    @endswitch
                                </span>
                                <a href="{{ route('superadmin.tickets.edit',$ticket) }}" class="btn-primary">
                                    Ver Detalles
                                </a>
                            </div>
                        </div>
                    @endforeach

                </div>
            </div>

        </div>
    </div>
</div>

@endsection

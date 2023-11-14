@extends('layouts.negocio.app')

@section('titulo')
    Ticket
@endsection

@section('content')

<div class="mt-2">
    <div class="w-full p-6 bg-white rounded shadow-md">

        <div class="flex justify-between items-center">
            <h2 class="text-xl font-semibold mb-4">Ticket de {{ $ticket->user->name }}</h2>

            <div class="flex justify-start">
                <a href="{{ route('negocio.tickets.index') }}" class="btn-primary">

                    Regresar

                </a>
            </div>
        </div>

        <div class="mb-4">
            <label for="asunto" class="label-edit">Asunto:</label>
            <p class="p-2 text-slate-300 bg-slate-100">
                {{ $ticket->asunto }}
            </p>
        </div>
        <div class="mb-4">
            <label for="descripcion" class="label-edit">Mensaje:</label>
            <p class="p-2 text-slate-300 bg-slate-100">
                {{ $ticket->descripcion }}
            </p>
        </div>

        {{ Aire::open()->route('negocio.tickets.update',$ticket) }}

            <div class="mb-4">
                <label for="respuesta" class="label-edit">{{ $ticket->status == 3 ? 'Respuesta:' : 'Responder:' }}</label>
                {{ Aire::textarea('respuesta')
                    ->class('w-full ' . ($ticket->status == 3 ? 'bg-slate-100 text-slate-300' : ''))
                    ->value($ticket->respuesta)
                    ->disabled($ticket->status == 3 ? true : true) }}
            </div>

        {{ Aire::close() }}

    </div>
</div>

@endsection

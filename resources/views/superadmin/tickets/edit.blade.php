@extends('layouts.superadmin.app')

@section('titulo')
    Ticket
@endsection

@section('content')

<div class="mt-2">
    <div class="w-full p-6 bg-white rounded shadow-md">

        <div class="flex justify-between items-center">
            <h2 class="text-xl font-semibold mb-4">Ticket de {{ $ticket->user->name }}</h2>

            <div class="flex justify-start">
                <a href="{{ route('superadmin.tickets.index') }}" class="btn-primary">

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

        {{ Aire::open()->route('superadmin.tickets.update',$ticket) }}

            @if ($ticket->status != 3)
                <div class="flex justify-end py-2 gap-2">
                    {{ Aire::submit('En Progreso')->class('btn-warning')->name('status')->value(2) }}
                    {{ Aire::submit('Pendiente')->class('btn-secondary')->name('status')->value(1) }}
                </div>
            @endif

            <div class="mb-4">
                <label for="respuesta" class="label-edit">{{ $ticket->status == 3 ? 'Respuesta:' : 'Responder:' }}</label>
                {{ Aire::textarea('respuesta')
                    ->class('w-full ' . ($ticket->status == 3 ? 'bg-slate-100 text-slate-300' : ''))
                    ->value($ticket->respuesta)
                    ->disabled($ticket->status == 3 ? true : false) }}
            </div>

            @if ($ticket->status != 3)
                <div class="flex justify-end py-2 gap-2">
                    {{ Aire::submit('Responder')->class('btn-new')->name('status')->value(3) }}
                </div>
            @endif

        {{ Aire::close() }}

    </div>
</div>

@endsection

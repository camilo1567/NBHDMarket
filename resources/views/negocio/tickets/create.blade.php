@extends('layouts.negocio.app')

@section('titulo')
    Crear Ticket
@endsection

@section('content')

<div class="mt-2">
    <div class="w-full p-6 bg-white rounded shadow-md">

        <div class="flex justify-between items-center">
            <h2 class="text-xl font-semibold mb-4">Crear Ticket</h2>


            <div class="flex justify-start">
                <a href="{{ route('negocio.tickets.index') }}" class="btn-primary">

                    Regresar

                </a>
            </div>
        </div>

        {{ Aire::open()->route('negocio.tickets.store')->encType('multipart/form-data') }}

            <div class="mb-4">
                <label for="tipo" class="label-edit">PQRS:</label>
                {{ Aire::select(['Peticion' => 'Peticion','Queja' => 'Queja','Reclamo' => 'Reclamo','Sugerencia' => 'Sugerencia'],'type') }}
            </div>

            <div class="mb-4">
                <label for="asunto" class="label-edit">Asunto:</label>
                {{ Aire::input('asunto') }}
            </div>
            <div class="mb-4">
                <label for="descripcion" class="label-edit">Descripcion:</label>
                {{ Aire::textarea('descripcion')->class('w-full') }}
            </div>
            <div class="mb-4">
                <label for="Archivo" class="label-edit">Archivo:</label>
                {{ Aire::file('archivo')->class('text-sm rounded-lg w-full') }}
            </div>

            <div class="flex justify-end py-2">
                {{ Aire::submit('Crear')->class('btn-new') }}
            </div>

        {{ Aire::close() }}

    </div>
</div>

@endsection

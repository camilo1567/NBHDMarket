@extends('layouts.superadmin.app')

@section('titulo')
    Crear Contacto
@endsection

@section('content')

    <div class="py-2">

        <div class="flex justify-start">
            <a href="{{ route('superadmin.contacts.index') }}" class="btn-primary">

                Regresar

            </a>
        </div>


    </div>

    <div class="p-6 bg-white rounded-lg">

        {{ Aire::open()->route('superadmin.contacts.store') }}

        <div class="grid gap-6 md:grid-cols-2">

                {{ Aire::input('nombre','Nombre') }}

                {{ Aire::input('apellido','Apellido') }}

                {{ Aire::input('email','Email') }}

                {{ Aire::input('telefono','Telefono') }}

        </div>

        <div class="flex justify-end py-2">
            {{ Aire::submit('Crear')->class('btn-new') }}
        </div>

        {{ Aire::close() }}

    </div>

@endsection

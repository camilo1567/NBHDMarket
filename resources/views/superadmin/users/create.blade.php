@extends('layouts.superadmin.app')

@section('titulo')
    Crear Usuario
@endsection

@section('content')

    <div class="py-2">

        <div class="flex justify-start">
            <a href="{{ route('superadmin.users.index') }}" class="btn-primary">

                Regresar

            </a>
        </div>


    </div>

    <div class="p-6 bg-white rounded-lg">

        {{ Aire::open()->route('superadmin.users.store') }}

        <div class="md:flex gap-2">

            <div class="md:w-1/2">

                {{ Aire::input('name','Nombre') }}

            </div>

            <div class="md:w-1/2">

                {{ Aire::input('email','Email') }}

            </div>

        </div>

        <div class="md:flex gap-2">

            <div class="md:w-1/2">

                {{ Aire::input('password','Contraseña')->type('password') }}

            </div>

            <div class="md:w-1/2">

                {{ Aire::input('password_confirmation','Confirmar Contraseña')->type('password') }}

            </div>

        </div>

        <div>
            <div class="md:w-1/2">
                {{ Aire::select(['0' => 'Escoger','1' => 'Negocio','2' => 'Cliente'],'rol','Rol') }}
            </div>
        </div>

        <div class="flex justify-end py-2">
            {{ Aire::submit('Crear')->class('btn-new') }}
        </div>

        {{ Aire::close() }}

    </div>

@endsection

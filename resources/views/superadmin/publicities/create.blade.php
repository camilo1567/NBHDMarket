@extends('layouts.superadmin.app')

@section('titulo')
    Productos
@endsection

@section('content')

    <div class="py-2">

        <div class="flex justify-start">
            <a href="{{ route('superadmin.publicities.index') }}" class="btn-primary">

                Regresar

            </a>
        </div>

    </div>

    <div class="p-6 bg-white rounded-lg">

        {{ Aire::open()->route('superadmin.publicities.store')->encType('multipart/form-data') }}

        <div class="gap-2">

            <div class="md:w-1/2">

                {{ Aire::file('archivo','Imagen') }}

            </div>

            <div class="md:w-1/2">

                {{ Aire::input('nombre','Nombre') }}

            </div>

        </div>

        <div class="md:flex gap-2">

            <div class="w-full">

                {{ Aire::textarea('descripcion','Descripcion') }}

            </div>

        </div>

        <div class="flex justify-end py-2">
            {{ Aire::submit('Crear')->class('btn-new') }}
        </div>

        {{ Aire::close() }}

@endsection

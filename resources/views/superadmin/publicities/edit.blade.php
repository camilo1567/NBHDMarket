@extends('layouts.superadmin.app')

@section('titulo')
    Publicidades
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

        {{ Aire::open()->route('superadmin.publicities.update',$publicity)->encType('multipart/form-data') }}

        <div class="gap-2">

            <div class="flex mb-2">

                <div class="md:w-1/2">
                    <img class="h-[250px]" src="{{ asset('storage/'.$publicity->imagen) }}" alt="{{ $publicity->nombre }}" />
                </div>


                <div class="md:w-1/2">

                    {{ Aire::file('archivo','Imagen')->value($publicity->imagen) }}

                </div>

            </div>



            <div class="md:w-1/2">

                {{ Aire::input('nombre','Nombre')->value($publicity->nombre) }}

            </div>

        </div>

        <div class="md:flex gap-2">

            <div class="w-full">

                {{ Aire::textarea('descripcion','Descripcion')->value($publicity->descripcion) }}

            </div>

        </div>

        <div class="flex justify-end py-2">
            {{ Aire::submit('Editar')->class('btn-new') }}
        </div>

        {{ Aire::close() }}

@endsection

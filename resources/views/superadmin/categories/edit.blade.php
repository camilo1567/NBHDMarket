@extends('layouts.superadmin.app')

@section('titulo')
    Editar Categoria
@endsection

@section('content')

    <div class="py-2">

        <div class="flex justify-start">
            <a href="{{ route('superadmin.categories.index') }}" class="btn-primary">

                Regresar

            </a>
        </div>
    </div>

    <div class="p-6 bg-white rounded-lg">

        {{ Aire::open()->route('superadmin.categories.update',$category) }}

        <div class="md:flex gap-2">

            <div class="md:w-1/2">

                {{ Aire::input('nombre','Nombre')->value($category->nombre) }}

            </div>

        </div>

        <div class="flex justify-end py-2">
            {{ Aire::submit('Editar')->class('btn-new') }}
        </div>

        {{ Aire::close() }}

    </div>

@endsection

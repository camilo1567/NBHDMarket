@extends('layouts.negocio.app')

@section('titulo')
    Productos
@endsection

@section('content')
    <div class="py-2">

        <div class="flex justify-start">
            <a href="{{ route('negocio.products.index') }}" class="btn-primary">

                Regresar

            </a>
        </div>

    </div>

    <div class="p-6 bg-white rounded-lg">
        <div class="md:w1/2 px-10 grid md:grid-cols-2">
            {{ Aire::open()->route('negocio.products.store')->encType('multipart/form-data') }}

            <div class="gap-2">

                <div class="md:w-1/2">

                    {{ Aire::file('archivo', 'Imagen') }}

                </div>
                <div>

                    {{ Aire::input('nombre', 'Nombre') }}

                    {{ Aire::input('precio', 'Precio') }}

                    {{ Aire::input('cantidad', 'Cantidad') }}

                    {{ Aire::textarea('descripcion', 'Descripción') }}

                </div>

            </div>

            <div class="flex justify-end py-2">
                {{ Aire::submit('Crear')->class('btn-new') }}
            </div>

            {{ Aire::close() }}
        </div>
    </div>
@endsection

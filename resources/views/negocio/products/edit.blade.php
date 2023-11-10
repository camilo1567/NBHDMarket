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

        {{ Aire::open()->route('negocio.products.update', $product)->encType('multipart/form-data') }}

        <div class="gap-2">

            <div class="flex mb-2">

                <div class="md:w-1/2">
                    <img class="h-[250px]" src="{{ asset('storage/'.$product->imagen) }}" alt="{{ $product->nombre }}" />
                </div>


                <div class="md:w-1/2">

                    {{ Aire::file('archivo','Imagen')->value($product->imagen) }}

                </div>

            </div>



            <div class="md:w-1/2">

                {{ Aire::input('nombre', 'Nombre')->value($product->nombre) }}

            </div>

        </div>

        <div class="md:flex gap-2">

            <div class="w-full">

                {{ Aire::input('precio', 'Precio')->value($product->precio) }}

                {{ Aire::input('cantidad', 'Cantidad')->value($product->cantidad) }}

                {{ Aire::textarea('descripcion', 'Descripcion')->value($product->descripcion) }}

            </div>

        </div>

        <div class="flex justify-end py-2">
            {{ Aire::submit('Editar')->class('btn-new') }}
        </div>

        {{ Aire::close() }}
    @endsection

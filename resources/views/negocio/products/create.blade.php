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
            <form action="{{ route('negocio.imagenes.store') }}" method="POST" enctype="multipart/form-data" id="dropzone"
                class="dropzone border-dashed border-2 w-96 h-96 rounded flex flex-col justify-center items-center">
                @csrf
            </form>

            <div>
                {{ Aire::open()->route('negocio.products.store') }}

                {{ Aire::input('nombre', 'Nombre') }}

                {{ Aire::input('precio', 'Precio') }}

                {{ Aire::input('cantidad', 'Cantidad') }}

                {{ Aire::textarea('descripcion', 'Descripción') }}

                <div>
                    <input type="hidden" name="imagen">
                    {{-- @error('imagen')
                        <p class="text-red-500">{{ $message }}</p>
                    @enderror --}}
                </div>

                <div class="flex justify-end py-2">
                    {{ Aire::submit('Crear')->class('btn-new') }}
                </div>

                {{ Aire::close() }}
            </div>
        </div>
    </div>
@endsection

@extends('layouts.public.app')

@section('content')

<div class="flex flex-col md:flex-row m-2">
    <div class="w-full flex justify-center md:w-1/2 p-3">
        <img class="h-[400px] w-[400px]" src="{{ asset('storage/' . $product->imagen) }}" alt="{{ $product->nombre }}">
    </div>
    <div class="w-full md:w-1/2 bg-white my-4 p-6 rounded-lg">
        {{-- <h2 class="text-3xl font-bold mb-2">{{ $product->subcategory->category->nombre }}</h2> --}}
        <h3 class="text-4xl font-bold uppercase text-center mb-4 py-2">{{ $product->user ? $product->user->name : 'No especificado' }}</h3>
        <h4 class="mb-4 text-2xl"><strong> Nombre: </strong> {{ $product->nombre }}</h4>
        <p class="mb-4 text-2xl"><strong> Descripcion: </strong> {{ $product->descripcion }}</p>
        <p class="mb-4 text-2xl"><strong> Precio: </strong> ${{ $product->precio }}</p>


        {{ Aire::open()->route('product.message',$product) }}

            <div class="mt-8 flex gap-2 items-center w-full">
                {{ Aire::input('message','Envia un mensaje al vendedor')->value('Hola. ¿Sigue disponible?') }}
                {{ Aire::submit('Enviar')->class('btn-primary mt-2') }}
            </div>

        {{ Aire::close() }}


    </div>
</div>

<div class="m-2 py-4">

    <div class="bg-white p-4 rounded-lg">
        <h2 class="text-3xl font-semibold mb-6">Comentarios:</h2>

        <div class="{{ $product->comments->count() > 0 ? '' : '' }}">

            @if ($product->comments->count() > 0)
                @foreach ($product->comments as $comentario)
                    @if($comentario->user)
                        <div class="flex flex-col gap-2 p-2 border-b border-gray-200">
                            <div class="flex justify-between items-center">
                                <div class="flex gap-1 items-center">
                                    <div class="rounded-full">
                                        <img class="w-10 h-10" src="{{ asset('storage/'.$comentario->user->settings->foto_perfil) }}" alt="">
                                    </div>
                                    <p class="text-xl font-semibold">{{ $comentario->user->name }}</p>
                                </div>
                                <p class="text-xl">{{ $comentario->created_at->diffForHumans() }}</p>
                            </div>
                            <p class="text-xl pl-10">{{ $comentario->comentario }}</p>
                        </div>
                    @endif
                @endforeach
            @endif
        </div>

        {{ Aire::open()->route('product.comentario',$product) }}

            <div class="mt-8 gap-2 items-center w-full">
                {{ Aire::input('comentario')->placeholder('Escribe un comentario...') }}
            </div>

        {{ Aire::close() }}
    </div>

</div>


@endsection

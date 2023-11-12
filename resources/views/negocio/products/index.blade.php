@extends('layouts.negocio.app')

@section('titulo')
    Productos
@endsection

@section('content')
    <div class="py-2">
        <div class="flex justify-start">
            <a href="{{ route('negocio.products.create') }}" class="btn-primary">
                Nuevo
            </a>
        </div>
    </div>

    <div class="container-template">
        <div class="p-0 overflow-y-auto grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-3 gap-4">
            @if ($products->isEmpty())
                <div class="p-4">
                    No hay productos creados
                </div>
            @endif
            @foreach ($products as $product)
                <div
                    class="max-w-sm bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
                    <a href="{{ route('negocio.products.edit', $product) }}" class="flex justify-center">
                        <img class="h-[250px] mt-4" src="{{ asset('storage/' . $product->imagen) }}"
                            alt="{{ $product->nombre }}" />
                    </a>
                    <hr class="mt-4">
                    <div class="p-5">
                        <div>
                            <h5 class="mb-2 text-xl font-bold tracking-tight text-gray-900 dark:text-white">
                                {{ $product->nombre }}
                            </h5>
                            <div class="flex items-center mb-2">
                                <h5 class="precio text-lg font-bold tracking-tight text-gray-700 dark:text-white">
                                    {{ $product->precio }}
                                </h5>
                                @if ($product->cantidad >= 1)
                                    <div class="pl-10 ml-36">
                                        <h5 class="text-sm font-semibold text-green-500 mr-2">En stock
                                            ({{ $product->cantidad }})</h5>
                                    </div>
                                @else
                                    <div class="pl-10 ml-40">
                                        <h5 class="text-sm font-semibold text-red-500 mr-2">Sin stock</h5>
                                    </div>
                                @endif
                            </div>
                            <p class="mb-3 font-normal text-gray-600 dark:text-gray-400">
                                {{ $product->descripcion }}
                            </p>
                        </div>

                        <div class="flex gap-2">

                            <a href="{{ route('negocio.products.edit', $product) }}" class="btn-primary">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"
                                    class="w-5 h-5">
                                    <path
                                        d="M5.433 13.917l1.262-3.155A4 4 0 017.58 9.42l6.92-6.918a2.121 2.121 0 013 3l-6.92 6.918c-.383.383-.84.685-1.343.886l-3.154 1.262a.5.5 0 01-.65-.65z" />
                                    <path
                                        d="M3.5 5.75c0-.69.56-1.25 1.25-1.25H10A.75.75 0 0010 3H4.75A2.75 2.75 0 002 5.75v9.5A2.75 2.75 0 004.75 18h9.5A2.75 2.75 0 0017 15.25V10a.75.75 0 00-1.5 0v5.25c0 .69-.56 1.25-1.25 1.25h-9.5c-.69 0-1.25-.56-1.25-1.25v-9.5z" />
                                </svg>

                                Editar
                            </a>

                            {{ Aire::open()->route('negocio.products.destroy', $product) }}
                            <button type="submit" class="btn-secondary"
                                onclick="return confirm('¿Seguro que desea eliminar este producto?')">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"
                                    class="w-5 h-5">
                                    <path fill-rule="evenodd"
                                        d="M8.75 1A2.75 2.75 0 006 3.75v.443c-.795.077-1.584.176-2.365.298a.75.75 0 10.23 1.482l.149-.022.841 10.518A2.75 2.75 0 007.596 19h4.807a2.75 2.75 0 002.742-2.53l.841-10.52.149.023a.75.75 0 00.23-1.482A41.03 41.03 0 0014 4.193V3.75A2.75 2.75 0 0011.25 1h-2.5zM10 4c.84 0 1.673.025 2.5.075V3.75c0-.69-.56-1.25-1.25-1.25h-2.5c-.69 0-1.25.56-1.25 1.25v.325C8.327 4.025 9.16 4 10 4zM8.58 7.72a.75.75 0 00-1.5.06l.3 7.5a.75.75 0 101.5-.06l-.3-7.5zm4.34.06a.75.75 0 10-1.5-.06l-.3 7.5a.75.75 0 101.5.06l.3-7.5z"
                                        clip-rule="evenodd" />
                                </svg>
                                Eliminar
                            </button>
                            {{ Aire::close() }}
                        </div>

                    </div>
                </div>
            @endforeach

        </div>

    </div>
@endsection

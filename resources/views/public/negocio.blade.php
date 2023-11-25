@extends('layouts.public.app')

@section('content')

    <div class="max-w-6xl mx-auto xl:px-0 my-2">
            <!-- card para productos -->
            @if ($negocio->products->count() > 0)
                <h2 class="text-2xl font-bold my-5">Productos</h2>
                <div class="grid xl:grid-cols-3 grid-cols-2 gap-7">
                    @foreach ($negocio->products as $product)
                        <a href="{{ route('public.product', $product) }}">
                            <div class="h-[520px] bg-white shadow-sm hover:shadow-lg hover:-translate-y-2 transition-all 300ms p-2 rounded-lg my-2">
                                <img class="mx-auto mb-2 h-[400px] rounded" src="{{ asset('storage/' . $product->imagen) }}"
                                    alt="nombre product">
                                <hr>
                                <div class="font-sans mt-4 ml-2">
                                    <p class="font-bold text-gray-800 text-lg"> {{ $product->nombre }} </p>
                                    <h5 class="precio text-lg font-medium tracking-tight text-gray-700 dark:text-white">
                                        {{ $product->precio }}</h5>
                                </div>

                            </div>
                        </a>
                    @endforeach
                </div>


            @else
                <div class="flex justify-center items-center bg-white p-4 h-screen">
                    <h2 class="text-2xl font-bold my-5">No hay productos</h2>
                </div>
            @endif
    </div>

@endsection

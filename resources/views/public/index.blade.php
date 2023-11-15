{{-- @php
    $product = App\Models\Product::first();
@endphp --}}


{{-- <x-app-layout> --}}

{{-- @php
    $product = App\Models\Product::first();
@endphp --}}

@extends('layouts.public.app')

@section('head')
    <style>
        .swiper-slide {
            transform: translateX(0);
        }

        [x-show*="currentImage"] .swiper-slide {
            transform: translateX(-100%);
        }
    </style>
@endsection

@section('content')
    <div class="mx-auto lg:px-4 px-4">
        <div x-data="{
            images: [
                { src: '{{ asset('img/publicidad/car1.png') }}', alt: 'Imagen 1' },
                { src: '{{ asset('img/publicidad/car2.png') }}', alt: 'Imagen 2' },
                { src: '{{ asset('img/publicidad/cell1.png') }}', alt: 'Imagen 3' },
                { src: '{{ asset('img/publicidad/cell2.png') }}', alt: 'Imagen 4' },
                { src: '{{ asset('img/publicidad/ele.png') }}', alt: 'Imagen 5' },
            ],
            currentImage: 0,
            startCarousel() {
                setInterval(() => {
                    this.currentImage = (this.currentImage + 1) % this.images.length;
                }, 11000);
            }
        }" x-init="startCarousel()" class="px-2">
            <div class="relative">
                <div class="swiper-s">
                    <div class="swiper-wrapper">
                        <template x-for="(image, index) in images" :key="index">
                            <div x-show="currentImage === index"
                                class="swiper-slide flex justify-center transition-transform duration-500 ease-in">
                                <img :src="image.src" :alt="image.alt" class="md:h-[400px] md:w-[900px]">
                            </div>
                        </template>
                    </div>
                </div>

                <div class="absolute top-1/2 -translate-y-1/2 left-0">
                    <button @click="currentImage = (currentImage - 1 + images.length) % images.length"
                        class="swiper-prev p-2 bg-gray-200 rounded-full shadow-md">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-gray-600" fill="none"
                            viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                        </svg>
                    </button>
                </div>

                <div class="absolute top-1/2 -translate-y-1/2 right-0">
                    <button @click="currentImage = (currentImage + 1) % images.length"
                        class="swiper-next p-2 bg-gray-200 rounded-full shadow-md">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-gray-600" fill="none"
                            viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                        </svg>
                    </button>
                </div>
            </div>
        </div>

        {{-- <div class=" max-w-6xl mx-auto xl:px-0 mt-5">
            <h2 class="text-2xl font-bold my-5">Negocios</h2>
            <div class="col-span-1 xl:col-span-1">
                @foreach ($negocios as $negocio)
                    <a href="{{ route('public.index', $negocio) }}">
                        <div
                            class="h-[520px] bg-white shadow-sm hover:shadow-lg hover:-translate-y-2 transition-all 300ms p-2 rounded-lg mt-2">
                            <img class="mx-auto mb-2 h-[400px] rounded" src="{{ asset('' . $negocio->foto_perfil) }}"
                                alt="nombre tienda">
                            <hr>
                            <div class="font-sans mt-4 ml-2">
                                <p class="font-bold text-gray-800 text-lg"> {{ $negocio->nombre }} </p>
                            </div>

                        </div>
                    </a>
                @endforeach
            </div>
        </div> --}}

        <div class="s max-w-6xl mx-auto xl:px-0">
            <h2 class="text-2xl font-bold my-5">Productos</h2>

            <div class="grid xl:grid-cols-3 grid-cols-2  gap-7">

                <!-- card para productos -->
                @foreach ($products as $product)
                    <a href="{{ route('public.index', $product) }}">
                        <div
                            class="h-[520px] bg-white shadow-sm hover:shadow-lg hover:-translate-y-2 transition-all 300ms p-2 rounded-lg mt-2">
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
                <!-- fin card para productos -->

            </div>
        </div>
    </div>

    <div class="h-[100px]"></div>
@endsection
{{-- </x-app-layout> --}}

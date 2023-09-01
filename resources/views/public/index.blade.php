@extends('layouts.public.app')

@section('head')

<style>
    .swiper-slide {
        transform: translateX(0); /* Initial position */
    }

    [x-show*="currentImage"] .swiper-slide {
        transform: translateX(-100%); /* Slide left */
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
                            <div x-show="currentImage === index" class="swiper-slide flex justify-center transition-transform duration-500 ease-in">
                                <img :src="image.src" :alt="image.alt" class="md:h-[400px] md:w-[900px]">
                            </div>
                        </template>
                    </div>
                </div>

                <div class="absolute top-1/2 -translate-y-1/2 left-0">
                    <button @click="currentImage = (currentImage - 1 + images.length) % images.length" class="swiper-prev p-2 bg-gray-200 rounded-full shadow-md">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-gray-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                        </svg>
                    </button>
                </div>

                <div class="absolute top-1/2 -translate-y-1/2 right-0">
                    <button @click="currentImage = (currentImage + 1) % images.length" class="swiper-next p-2 bg-gray-200 rounded-full shadow-md">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-gray-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                        </svg>
                    </button>
                </div>
            </div>
        </div>

        <div class=" max-w-6xl mx-auto xl:px-0 mt-5">
            <h2 class="text-2xl font-bold my-5">Ofertas</h2>
            <div class="col-span-1 xl:col-span-1">
                <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-3 gap-4">
                    <div class="w-full flex items-end justify-center pb-5 rounded xl:h-72 h-40 bg-cover bg-center"
                        style="background-image: url({{ asset('img/categorias/ropa.png') }})"
                    >
                    </div>
                    <div class="w-full flex items-end justify-center pb-5 rounded xl:h-72 h-40 bg-cover bg-center"
                        style="background-image: url({{ asset('img/categorias/ropa.png') }})"
                    >
                    </div>
                    <div class="w-full flex items-end justify-center pb-5 rounded xl:h-72 h-40 bg-cover bg-center"
                        style="background-image: url({{ asset('img/categorias/ropa.png') }})"
                    >
                    </div>
                </div>
            </div>
        </div>

        <div class="s max-w-6xl mx-auto xl:px-0">
            <h2 class="text-2xl font-bold my-5">Tiendas</h2>

            <div class="grid xl:grid-cols-3 grid-cols-2  gap-7">


                <a href="#" class="col-span-1 xl:col-span-1">

                    <div class="w-full flex items-end justify-center pb-5 rounded xl:h-72 h-40 bg-cover bg-center" style="background-image: url({{ asset('img/categorias/ropa.png') }})">
                        <div class="bg-gray-100 px-5 py-1  font-semibold rounded-full xl:flex hidden">
                            Ropa
                        </div>
                    </div>
                    <div class="text-center items-center px-5 py-1  font-semibold  xl:hidden flex w-full justify-center mt-1">
                        <span>Ropa</span>
                    </div>

                </a>

                <a href="#" class="col-span-1 xl:col-span-1">

                    <div class="w-full flex items-end justify-center pb-5 rounded xl:h-72 h-40 bg-cover bg-center" style="background-image: url({{ asset('img/categorias/zapato.png') }})">
                        <div class="bg-gray-100 px-5 py-1  font-semibold rounded-full xl:flex hidden">
                            Zapatos
                        </div>
                    </div>
                    <div class="text-center items-center px-5 py-1  font-semibold  xl:hidden flex w-full justify-center mt-1">
                        <span>Zapatos</span>
                    </div>

                </a>

                <a href="#" class="col-span-1 xl:col-span-1">

                    <div class="w-full flex items-end justify-center pb-5 rounded xl:h-72 h-40 bg-cover bg-center" style="background-image: url({{ asset('img/categorias/productos.png') }})">
                        <div class="bg-gray-100 px-5 py-1  font-semibold rounded-full xl:flex hidden">
                            Productos
                        </div>
                    </div>
                    <div class="text-center items-center px-5 py-1  font-semibold  xl:hidden flex w-full justify-center mt-1">
                        <span>Productos</span>
                    </div>

                </a>

                <a href="#" class="col-span-1 xl:col-span-1">

                    <div class="w-full flex items-end justify-center pb-5 rounded xl:h-72 h-40 bg-cover bg-center" style="background-image: url({{ asset('img/categorias/comidas.png') }})">
                        <div class="bg-gray-100 px-5 py-1  font-semibold rounded-full xl:flex hidden">
                            Comida
                        </div>
                    </div>
                    <div class="text-center items-center px-5 py-1  font-semibold  xl:hidden flex w-full justify-center mt-1">
                        <span>Comida</span>
                    </div>

                </a>

                <a href="#" class="col-span-2 xl:col-span-1">

                    <div class="w-full flex items-end justify-center pb-5 rounded xl:h-72 h-40 bg-cover bg-center" style="background-image: url({{ asset('img/categorias/bebidas.png') }})">
                        <div class="bg-gray-100 px-5 py-1  font-semibold rounded-full xl:flex hidden">
                            Bebidas
                        </div>
                    </div>
                    <div class="text-center items-center px-5 py-1  font-semibold  xl:hidden flex w-full justify-center mt-1">
                        <span>Bebidas</span>
                    </div>

                </a>

                <a href="#" class="col-span-1 xl:col-span-1">

                    <div class="w-full flex items-end justify-center pb-5 rounded xl:h-72 h-40 bg-cover bg-center" style="background-image: url({{ asset('img/categorias/cuadros.png') }})">
                        <div class="bg-gray-100 px-5 py-1  font-semibold rounded-full xl:flex hidden">
                            Arte
                        </div>
                    </div>
                    <div class="text-center items-center px-5 py-1  font-semibold  xl:hidden flex w-full justify-center mt-1">
                        <span>Arte</span>
                    </div>

                </a>
            </div>
        </div>
    </div>

    <div class="h-[100px]"></div>


@endsection

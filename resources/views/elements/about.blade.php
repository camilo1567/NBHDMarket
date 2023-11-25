@extends('layouts.public.app')

@section('content')
    <div class="container mx-auto p-8 w-[90%]">
        <div class="mb-10 grid gap-4 ">
            <!-- Sección "Sobre Nosotros" -->
            <h1 class="text-3xl text-start font-bold mb-4 pb-4">Sobre Nosotros</h1>

            <div
                class="bg-white rounded-lg text-gray-700  shadow-lg p-6">

                <h1 class="text-3xl text-center font-bold pb-4 drop-shadow-sm">Nuestro slogan</h1>

                <p class="leading-relaxed m-5">
                    Nos esforzamos por ser la plataforma más confiable,
                    donde los emprendedores encuentren el apoyo que los impulsa
                    a alcanzar su máximo potencial y donde los consumidores descubran
                    productos y servicios únicos que enriquezcan sus vidas.
                </p>

                <!-- Subsección "Nuestra misión" -->

                <h2 class="text-3xl text-center font-bold pb-4 drop-shadow-sm ">Nuestra misión</h2>
                <p class="leading-relaxed m-5">
                    Ser la plataforma líder a nivel global que conecta a emprendedores,
                    creadores y pequeñas empresas con una audiencia ávida de descubrir productos únicos,
                    servicios excepcionales y experiencias inolvidables. Nuestra misión es empoderar a los emprendedores,
                    brindándoles las herramientas y la visibilidad necesaria
                    para prosperar en un mundo cada vez más conectado y digital.
                </p>

                <!-- Sección "Nuestra visión" -->

                <h2 class="text-3xl text-center font-bold pb-4 drop-shadow-sm">Nuestra visión</h2>

                <p class="leading-relaxed m-5">
                    Nos esforzamos por ser la plataforma más confiable,
                    donde los emprendedores encuentren el apoyo que los impulsa
                    a alcanzar su máximo potencial y donde los consumidores descubran
                    productos y servicios únicos que enriquezcan sus vidas. Nuestra visión es forjar un mundo donde la
                    creatividad,
                    la innovación y la pasión se unan para dar forma a un futuro
                    lleno de oportunidades ilimitadas.
                </p>
            </div>

            <!-- Side Section -->

            <div
                class=" bg-white rounded-lg text-gray-700  shadow-lg p-6">

                <h1 class="text-3xl text-center font-bold pb-4 drop-shadow-sm">Contactos</h1>

                <div class="grid md:grid-cols-2 items-center overflow-y-hidden p-4 gap-8">

                    @foreach ($contactos as $contacto)
                        <div class="items-center pb-6 px-4">
                            <div class="flex justify-center mb-6">
                                <img class="rounded-full w-[250px] h-[250px] bg-slate-100" src="{{ asset('storage/'.$contacto->foto) }}" alt="">
                            </div>
                            <div class="flex justify-center">
                                <div>
                                    <h1 class="text-3xl font-bold mb-4 text-center">{{ $contacto->nombre }} {{ $contacto->apellido }}</h1>
                                    <p class="text-sm mb-4"><strong>Descripcion:</strong> {{ $contacto->descripcion }}</p>
                                    <p class="text-sm mb-4"><strong>Numero: </strong> {{ $contacto->telefono }}</p>
                                </div>
                            </div>
                        </div>
                    @endforeach

                </div>
            </div>
        </div>
    </div>
@endsection

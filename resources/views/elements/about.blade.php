@extends('layouts.public.app')

@section('content')
    <div class="container mx-auto p-8 w-[90%]">
        <div class="mb-10 grid gap-4 ">
            <!-- Sección "Sobre Nosotros" -->
            <h1 class="text-3xl text-start font-bold mb-4 pb-4">Sobre Nosotros</h1>

            <div
                class="bg-white rounded-lg text-gray-700 hover:text-white shadow-lg hover:bg-blue-700 hover:-translate-y-2 transition duration-300 p-6">

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
                class="h-[500px] bg-white rounded-lg text-gray-700 hover:text-white shadow-lg hover:bg-blue-700 hover:-translate-y-2 transition duration-300 p-6">

                <h1 class="text-3xl text-center font-bold pb-4 drop-shadow-sm">Contactanos</h1>

                <div class="grid grid-cols-4 items-center h-[250px] p-4 gap-8 text-center">
                    
                        <div class="flex flex-col  items-center pb-6">
                            <div class="rounded-full h-[140px] w-[140px] bg-violet-700 border-white mb-2"></div>
                            <h1 class="text-3xl font-bold">Juan Camilo Horta</h1>
                        </div>
                    
                    <div class="flex flex-col items-center">
                        <div class="rounded-full h-[140px] w-[140px] bg-violet-700 border-white mb-2"></div>
                        <h1 class="text-3xl font-bold">Miguel Angel Martinez Gomez</h1>
                    </div>
                    <div class="flex flex-col items-center">
                        <div class="rounded-full h-[140px] w-[140px] bg-violet-700 border-white mb-2"></div>
                        <h1 class="text-3xl font-bold">Miguel Angel Usma Mosquera</h1>
                    </div>
                    <div class="flex flex-col items-center">
                        <div class="rounded-full h-[140px] w-[140px] bg-violet-700 border-white mb-2"></div>
                        <h1 class="text-3xl font-bold">Angel Yesid Campiño Vidal</h1>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

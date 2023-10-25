@extends('layouts.public.app')

@section('content')
    <div class="container mx-auto p-8 w-[90%]">
        <h1 class="text-3xl text-center font-bold mb-4 pb-4">Sobre Nosotros</h1>

        <div class="grid md:grid-cols-3 gap-8">
        
            <section class="mx-auto p-6 mt-10 bg-white rounded-lg text-gray-700 hover:text-white shadow-lg hover:bg-blue-700 hover:-translate-y-2 transition duration-300">
                <div class="flex justify-center items-center">
                    <h1 class="text-3xl text-center font-bold mb-4 pb-4 drop-shadow-sm ">Nuestra misión</h1>
                </div>
                <p class="leading-relaxed m-5 ">
                    Ser la plataforma líder a nivel global que conecta a emprendedores,
                    creadores y pequeñas empresas con una audiencia ávida de descubrir productos únicos,
                    servicios excepcionales y experiencias inolvidables.
                </p>
                <p class="leading-relaxed m-5">
                    Nuestra misión es empoderar a los emprendedores,
                    brindándoles las herramientas y la visibilidad necesaria
                    para prosperar en un mundo cada vez más conectado y digital."
                </p>
            </section>

            <div class="mx-auto p-6 mt-10 h-[250px] bg-white rounded-lg text-gray-700 hover:text-white shadow-lg hover:bg-blue-700 hover:-translate-y-2 transition duration-300">
                <h1 class="text-3xl text-center font-bold mb-4 pb-4 drop-shadow-sm">Valores</h1>
                <p class="leading-relaxed m-5">
                    - Innovación <br> 

                    - Calidad y Confianza <br>

                    - Sostenibilidad <br>

                    - Comunidad
                </p>
            </div>
            
            <section class="mx-auto p-6 mt-10 bg-white rounded-lg drop-shadow-lg text-gray-700 hover:text-white hover:bg-blue-700 hover:-translate-y-2 transition duration-300">
                <div class="flex justify-center items-center">
                    <h1 class="text-3xl text-center font-bold mb-4 pb-4 drop-shadow-sm">Nuestra visión</h1>
                </div>
                <p class="leading-relaxed m-5">
                    Nos esforzamos por ser la plataforma más confiable, 
                    donde los emprendedores encuentren el apoyo que los impulsa 
                    a alcanzar su máximo potencial y donde los consumidores descubran 
                    productos y servicios únicos que enriquezcan sus vidas.
                </p>
                <p class="leading-relaxed m-5">
                    Nuestra visión es forjar un mundo donde la creatividad, 
                    la innovación y la pasión se unan para dar forma a un futuro 
                    lleno de oportunidades ilimitadas".
                </p>
            </section>
            
        </div>
        {{-- <section class="mx-auto p-6 mt-10 w-full bg-white rounded-lg shadow-lg text-gray-700 hover:text-white hover:bg-blue-700 hover:-translate-y-2 transition duration-300">
            <div class="flex justify-center items-center">
                <h1 class="text-3xl text-center font-bold mb-4 pb-4 drop-shadow-sm">Nuestro slogan</h1>
            </div>
            <p class="leading-relaxed m-5">
                Nos esforzamos por ser la plataforma más confiable, 
                donde los emprendedores encuentren el apoyo que los impulsa 
                a alcanzar su máximo potencial y donde los consumidores descubran 
                productos y servicios únicos que enriquezcan sus vidas.
            </p>
        </section> --}}
    </div>
@endsection

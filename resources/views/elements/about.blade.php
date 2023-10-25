@extends('layouts.public.app')

@section('content')

<div class="container mx-auto p-8">
    <h1 class="text-3xl font-bold mb-4">Sobre Nosotros</h1>
    
    <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
        <div>
            <img src="ruta/a/la/imagen.jpg" alt="Imagen del equipo" class="rounded-lg mb-4">
        </div>
        <div>
            <p class="text-gray-700 leading-relaxed">
                Somos un equipo apasionado dedicado a proporcionar soluciones innovadoras para nuestros clientes. 
                Desde nuestros humildes comienzos, hemos crecido y evolucionado para convertirnos en líderes en 
                la industria. Nuestra misión es superar las expectativas y ofrecer resultados excepcionales.
            </p>
            <p class="text-gray-700 leading-relaxed mt-4">
                En el centro de nuestro enfoque están la calidad, la integridad y la satisfacción del cliente. 
                Trabajamos arduamente para construir relaciones sólidas y duraderas con aquellos a quienes servimos, 
                y cada proyecto es una oportunidad para superar los límites y hacer realidad las visiones de nuestros clientes.
            </p>
        </div>
    </div>
</div>

@endsection
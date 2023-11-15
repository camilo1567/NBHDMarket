@extends('layouts.negocio.app')

@section('titulo')
    Ajustes
@endsection

@section('content')

    <!-- espacio para imagen -->

    <div class="mx-2 mt-2 h-screen bg-white rounded-lg overflow-y-scroll">
        <div class="p-5">

            <h1 class="text-2xl font-bold uppercase pb-4">Ajustes</h1>

            {{ Aire::open()->route('negocio.ajustes.update')->encType('multipart/form-data') }}

            <section class="py-4 border-b">

                <h2 class="text-lg text-black text-center font-bold">Foto de perfil</h2>

                <div class="pt-4">
                    <div class="flex justify-center">

                        @if ($settings->foto_perfil)

                            <img class="rounded-full w-[200px] h-[200px] bg-slate-100" src="{{ asset('storage/'.$settings->foto_perfil) }}" alt="imagen foto de perfil">

                        @else

                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="rounded-full w-[200px] h-[200px] bg-slate-100 text-slate-300 p-2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 6a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0zM4.501 20.118a7.5 7.5 0 0114.998 0A17.933 17.933 0 0112 21.75c-2.676 0-5.216-.584-7.499-1.632z" />
                            </svg>


                        @endif

                    </div>
                    <div class="flex justify-center text-sm">
                        {{ Aire::file('image')->class('w-full') }}
                    </div>
                </div>

            </section>

            <section class="py-2 border-b">

                <h2 class="text-lg text-black font-bold">Informacion</h2>

                <div class="pt-4">
                    <!-- contacto -->
                    <div class="w-full md:w-1/2 text-lg font-bold">

                        {{ Aire::number('contacto','Numero de Contacto')->value($settings->contacto) }}

                    </div>

                    <!--- direccion -->
                    <div class="w-full md:w-1/2 text-lg font-bold">

                        {{ Aire::input('direccion','Direccion')->value($settings->direccion) }}

                    </div>
                </div>


            </section>

            <section class="py-2 border-b">

                <h2 class="text-lg text-black font-bold">Redes Sociales</h2>

                <div class="pt-4 text-sm">
                    <!-- whatsapp -->
                    <div class="w-full md:w-1/2 font-bold">

                        <div class="flex gap-1 items-center pb-1">
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-brand-whatsapp" width="20" height="20" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                <path d="M3 21l1.65 -3.8a9 9 0 1 1 3.4 2.9l-5.05 .9"></path>
                                <path d="M9 10a.5 .5 0 0 0 1 0v-1a.5 .5 0 0 0 -1 0v1a5 5 0 0 0 5 5h1a.5 .5 0 0 0 0 -1h-1a.5 .5 0 0 0 0 1"></path>
                             </svg>
                            WhatsApp
                        </div>

                        {{ Aire::input('whatsapp')->value($settings->contacto) }}

                    </div>

                    <!--- instagram -->
                    <div class="w-full md:w-1/2 font-bold">

                        <div class="flex gap-1 items-center pb-1">
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-brand-instagram" width="20" height="20" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                <path d="M4 4m0 4a4 4 0 0 1 4 -4h8a4 4 0 0 1 4 4v8a4 4 0 0 1 -4 4h-8a4 4 0 0 1 -4 -4z"></path>
                                <path d="M12 12m-3 0a3 3 0 1 0 6 0a3 3 0 1 0 -6 0"></path>
                                <path d="M16.5 7.5l0 .01"></path>
                            </svg>
                            Instagram
                        </div>

                        {{ Aire::input('instagram')->value($settings->instagram) }}


                    </div>

                    <!-- facebook -->
                    <div class="w-full md:w-1/2  font-bold">

                        <div class="flex gap-1 items-center pb-1">
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-brand-facebook" width="20" height="20" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                <path d="M7 10v4h3v7h4v-7h3l1 -4h-4v-2a1 1 0 0 1 1 -1h3v-4h-3a5 5 0 0 0 -5 5v2h-3"></path>
                            </svg>
                            Facebook
                        </div>

                        {{ Aire::input('facebook')->value($settings->facebook) }}

                    </div>

                    <!--- twitter -->
                    <div class="w-full md:w-1/2 font-bold">

                        <div class="flex gap-1 items-center pb-1">
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-brand-x" width="20" height="20" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                <path d="M4 4l11.733 16h4.267l-11.733 -16z"></path>
                                <path d="M4 20l6.768 -6.768m2.46 -2.46l6.772 -6.772"></path>
                            </svg>
                            Twitter
                        </div>

                        {{ Aire::input('twitter')->value($settings->twitter) }}

                    </div>
                </div>

            </section>

            <section class="py-2 border-b">

                <h2 class="text-lg text-black font-bold">Sobre mi</h2>

                {{ Aire::textarea('descripcion')->class('w-full')->value($settings->descripcion) }}

            </section>

            <div class="flex justify-end py-2">
                {{ Aire::submit('Guardar')->class('btn-new') }}
            </div>

            {{ Aire::close() }}

        </div>

    </div>


@endsection

<x-guest-layout>


    <div class="flex justify-center md:p-4 bg-gray-100">
        <div class="bg-white m-4 w-full rounded-lg">
            {{ Aire::open()->route('negocio.datacomplete',$user)->encType('multipart/form-data') }}

                <div class="text-center text-xl md:text-2xl py-2 font-bold my-4 border-b border-black">
                    <h1>DATOS PARA SU NEGOCIO</h1>
                </div>

                <div class="border-b border-black">
                    <div class="p-4">

                        <div class="text-lg md:text-xl font-bold pb-4 mb-4 uppercase">
                            <h2>Informacion principal</h2>
                        </div>

                        <div class="md:flex gap-2">
                            <div class="w-full md:w-1/2">
                                {{ Aire::file('imagen1','Foto de perfil') }}
                            </div>

                            <div class="w-full md:w-1/2">
                                {{ Aire::file('imagen2','Foto de portada') }}
                            </div>
                        </div>

                        <div class="md:flex gap-2">
                            <div class="w-full md:w-1/2">
                                {{ Aire::input('nombre','Nombre del negocio') }}
                            </div>

                            <div class="w-full md:w-1/2">
                                {{ Aire::input('direccion','Direccion') }}
                            </div>
                        </div>

                        <div class="md:flex gap-2">
                            <div class="w-full md:w-1/2">
                                {{ Aire::number('contacto','Numero de contacto') }}
                            </div>
                        </div>

                    </div>
                </div>

                <div class="border-b border-black">
                    <div class="p-4">

                        <div class="text-lg md:text-xl font-bold pb-4 mb-4 uppercase">
                            <h2>Redes Sociales</h2>
                        </div>

                        <div class="md:flex gap-2">
                            <div class="w-full md:w-1/2 font-bold">

                                <label class="flex gap-1 items-center pb-1">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-brand-whatsapp" width="20" height="20" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                        <path d="M3 21l1.65 -3.8a9 9 0 1 1 3.4 2.9l-5.05 .9"></path>
                                        <path d="M9 10a.5 .5 0 0 0 1 0v-1a.5 .5 0 0 0 -1 0v1a5 5 0 0 0 5 5h1a.5 .5 0 0 0 0 -1h-1a.5 .5 0 0 0 0 1"></path>
                                     </svg>
                                    WhatsApp
                                </label>

                                {{ Aire::input('whatsapp') }}

                            </div>

                            <div class="w-full md:w-1/2 font-bold">

                                <label class="flex gap-1 items-center pb-1">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-brand-instagram" width="20" height="20" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                        <path d="M4 4m0 4a4 4 0 0 1 4 -4h8a4 4 0 0 1 4 4v8a4 4 0 0 1 -4 4h-8a4 4 0 0 1 -4 -4z"></path>
                                        <path d="M12 12m-3 0a3 3 0 1 0 6 0a3 3 0 1 0 -6 0"></path>
                                        <path d="M16.5 7.5l0 .01"></path>
                                    </svg>
                                    Instagram
                                </label>

                                {{ Aire::input('instagram') }}


                            </div>
                        </div>

                        <div class="md:flex gap-2">
                            <div class="w-full md:w-1/2  font-bold">

                                <label class="flex gap-1 items-center pb-1">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-brand-facebook" width="20" height="20" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                        <path d="M7 10v4h3v7h4v-7h3l1 -4h-4v-2a1 1 0 0 1 1 -1h3v-4h-3a5 5 0 0 0 -5 5v2h-3"></path>
                                    </svg>
                                    Facebook
                                </label>

                                {{ Aire::input('facebook') }}

                            </div>

                            <div class="w-full md:w-1/2 font-bold">

                                <label class="flex gap-1 items-center pb-1">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-brand-x" width="20" height="20" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                        <path d="M4 4l11.733 16h4.267l-11.733 -16z"></path>
                                        <path d="M4 20l6.768 -6.768m2.46 -2.46l6.772 -6.772"></path>
                                    </svg>
                                    Twitter
                                </label>

                                {{ Aire::input('twitter') }}

                            </div>
                        </div>

                    </div>
                </div>

                <div class="border-b border-black">
                    <div class="p-4">

                        <div class="text-lg md:text-xl font-bold pb-4 mb-4 uppercase">
                            <h2>Descripcion del negocio</h2>
                        </div>

                        <div class="w-full">
                            {{ Aire::textarea('descripcion','Descripcion') }}
                        </div>

                    </div>
                </div>

                <div class="flex justify-end p-4">
                    {{ Aire::submit('Enviar')->class('btn-new') }}
                </div>

            {{ Aire::close() }}
        </div>
    </div>



</x-guest-layout>

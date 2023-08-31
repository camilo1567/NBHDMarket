<x-guest-layout>

    <main class="mt-0 transition-all duration-200 ease-soft-in-out">
        <section>
          <div class="relative flex items-center p-0 overflow-hidden bg-center bg-cover min-h-75-screen">
            <div class="container z-10">
              <div class="flex flex-wrap mt-0 -mx-3">
                <div class="flex flex-col w-full max-w-full px-3 mx-auto md:flex-0 shrink-0 md:w-6/12 lg:w-5/12 xl:w-4/12">
                  <div class="relative flex flex-col min-w-0 mt-32 break-words bg-transparent border-0 shadow-none rounded-2xl bg-clip-border">
                    <div class="p-6 pb-0 mb-0 bg-transparent border-b-0 rounded-t-2xl">
                      <h3 class="text-template text-2xl">Registrate</h3>
                      <p class="mb-0">Ingresa tu nombre, email y contraseña para registrarte</p>
                    </div>
                    <div class="flex-auto p-6">
                        <form method="POST" action="{{ route('register') }}" novalidate="novalidate">
                         @csrf

                            <!-- Name -->
                            <div>
                                <x-input-label for="name" :value="__('Nombre')" />
                                <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')"  autofocus autocomplete="name" />
                                <x-input-error :messages="$errors->get('name')" class="mt-2" />
                            </div>

                            <!-- Email Address -->
                            <div class="mt-4">
                                <x-input-label for="email" :value="__('Email')" />
                                <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')"  autocomplete="username" />
                                <x-input-error :messages="$errors->get('email')" class="mt-2" />
                            </div>

                            <!-- Password -->
                            <div class="mt-4">
                                <x-input-label for="password" :value="__('Contraseña')" />

                                <x-text-input id="password" class="block mt-1 w-full"
                                                type="password"
                                                name="password"
                                                autocomplete="new-password" />

                                <x-input-error :messages="$errors->get('password')" class="mt-2" />
                            </div>

                            <!-- Confirm Password -->
                            <div class="mt-4">
                                <x-input-label for="password_confirmation" :value="__('Confirmar Contraseña')" />

                                <x-text-input id="password_confirmation" class="block mt-1 w-full"
                                                type="password"
                                                name="password_confirmation"  autocomplete="new-password" />

                                <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                            </div>

                            <div class="mt-4">

                                <x-input-label for="rol" :value="__('Tipo de Usuario')" />

                                <div class="mt-1">
                                    {{ Aire::select(['0' => 'Escoger','1' => 'Negocio','2' => 'Cliente'],'rol') }}
                                </div>
                            </div>

                            <x-primary-button class="text-center">
                                {{ __('Registrarse') }}
                            </x-primary-button>
                        </form>
                    </div>
                    <div class="p-6 px-1 pt-0 text-center bg-transparent border-t-0 border-t-solid rounded-b-2xl lg:px-2">
                      <p class="mx-auto mb-6 leading-normal text-sm">
                        Ya tienes una cuenta?
                        <a href="{{ route('login') }}" class="text-template font-semibold">Iniciar Sesion</a>
                      </p>
                    </div>
                  </div>
                </div>
                <!-- imagen -->
                <div class="w-full max-w-full px-3 lg:flex-0 shrink-0 md:w-6/12">
                    <div class="absolute top-0 hidden w-3/5 h-full -mr-32 overflow-hidden -skew-x-10 -right-40 rounded-bl-xl md:block">
                        <div class="absolute inset-x-0 top-0 z-0 h-full -ml-16 bg-cover skew-x-10" style="background-image: url({{ asset('img/marketplace/stores.png') }})"></div>
                    </div>
                </div>
              </div>
            </div>
          </div>
        </section>
    </main>

</x-guest-layout>

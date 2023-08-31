<x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <main class="mt-0 transition-all duration-200 ease-soft-in-out">
        <section>
          <div class="relative flex items-center p-0 overflow-hidden bg-center bg-cover min-h-75-screen">
            <div class="container z-10">
              <div class="flex flex-wrap mt-0 -mx-3">
                <div class="flex flex-col w-full max-w-full px-3 mx-auto md:flex-0 shrink-0 md:w-6/12 lg:w-5/12 xl:w-4/12">
                  <div class="relative flex flex-col min-w-0 mt-32 break-words bg-transparent border-0 shadow-none rounded-2xl bg-clip-border">
                    <div class="p-6 pb-0 mb-0 bg-transparent border-b-0 rounded-t-2xl">
                      <h3 class="text-template text-2xl">Bienvenido</h3>
                      <p class="mb-0">Ingresa tu email y contraseña para iniciar sesion</p>
                    </div>
                    <div class="flex-auto p-6">
                        <form method="POST" action="{{ route('login') }}" novalidate="novalidate">
                         @csrf

                            <div class="mb-4">
                                <x-input-label for="email" :value="__('Email')" />
                                <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')"  autofocus autocomplete="username" />
                                <x-input-error :messages="$errors->get('email')" class="mt-2" />
                            </div>

                            <!-- Password -->
                            <div class="mb-4">
                                <x-input-label for="password" :value="__('Password')" />

                                <x-text-input id="password" class="block mt-1 w-full"
                                                type="password"
                                                name="password"
                                                autocomplete="current-password" />

                                <x-input-error :messages="$errors->get('password')" class="mt-2" />
                            </div>

                            <div class="block mt-4">
                                <label for="remember_me" class="inline-flex items-center">
                                    <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500" name="remember">
                                    <span class="ml-2 text-sm text-gray-600">{{ __('Recordar') }}</span>
                                </label>
                            </div>

                            <x-primary-button class="text-center">
                                {{ __('Iniciar Sesion') }}
                            </x-primary-button>
                        </form>
                    </div>
                    <div class="p-6 px-1 pt-0 text-center bg-transparent border-t-0 border-t-solid rounded-b-2xl lg:px-2">
                        <p class="mx-auto mb-6 leading-normal text-sm">
                            No tienes ninguna cuenta aun?
                            <a href="{{ route('register') }}" class="text-template font-semibold">Registrarse</a>
                        </p>

                        @if (Route::has('password.request'))
                            <a class="text-template" href="{{ route('password.request') }}">
                                {{ __('¿Olvidaste tu contraseña?') }}
                            </a>
                        @endif
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

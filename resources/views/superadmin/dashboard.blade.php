@extends('layouts.superadmin.app')

@section('titulo')
    Dashboard
@endsection

@section('content')

    <div class="md:flex w-full">
        <a href="{{ route('superadmin.users.index') }}" class="flex bg-white p-4 m-2 md:w-1/3 rounded-lg">
            <div class="text-white bg-gradient-to-tl from-purple-700 h-12 w-12 to-pink-500 mr-2 flex items-center justify-center rounded-lg bg-white bg-center stroke-0 text-center xl:p-2">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M15 19.128a9.38 9.38 0 002.625.372 9.337 9.337 0 004.121-.952 4.125 4.125 0 00-7.533-2.493M15 19.128v-.003c0-1.113-.285-2.16-.786-3.07M15 19.128v.106A12.318 12.318 0 018.624 21c-2.331 0-4.512-.645-6.374-1.766l-.001-.109a6.375 6.375 0 0111.964-3.07M12 6.375a3.375 3.375 0 11-6.75 0 3.375 3.375 0 016.75 0zm8.25 2.25a2.625 2.625 0 11-5.25 0 2.625 2.625 0 015.25 0z" />
                </svg>
            </div>
            <div>
                <p class="font-bold text-slate-700 text-lg">Usuarios</p>
                <p class="text-slate-700 opacity-50 font-bold text-sm">Cantidad: {{ count($users) }}</p>
            </div>
        </a>

        <a href="{{ route('superadmin.users.clientes') }}" class="flex bg-white p-4 m-2 md:w-1/3 rounded-lg">
            <div class="text-white bg-gradient-to-tl from-purple-700 h-12 w-12 to-pink-500 mr-2 flex items-center justify-center rounded-lg bg-white bg-center stroke-0 text-center xl:p-2">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M15 19.128a9.38 9.38 0 002.625.372 9.337 9.337 0 004.121-.952 4.125 4.125 0 00-7.533-2.493M15 19.128v-.003c0-1.113-.285-2.16-.786-3.07M15 19.128v.106A12.318 12.318 0 018.624 21c-2.331 0-4.512-.645-6.374-1.766l-.001-.109a6.375 6.375 0 0111.964-3.07M12 6.375a3.375 3.375 0 11-6.75 0 3.375 3.375 0 016.75 0zm8.25 2.25a2.625 2.625 0 11-5.25 0 2.625 2.625 0 015.25 0z" />
                </svg>
            </div>
            <div>
                <p class="font-bold text-slate-700 text-lg">Clientes</p>
                <p class="text-slate-700 opacity-50 font-bold text-sm">Cantidad: {{ $users->filter(function ($user) {
                    return $user->hasRole('cliente');
                })->count() }}</p>
            </div>
        </a>

        <a href="{{ route('superadmin.users.negocios') }}" class="flex bg-white p-4 m-2 md:w-1/3 rounded-lg">
            <div class="text-white bg-gradient-to-tl from-purple-700 h-12 w-12 to-pink-500 mr-2 flex items-center justify-center rounded-lg bg-white bg-center stroke-0 text-center xl:p-2">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M13.5 21v-7.5a.75.75 0 01.75-.75h3a.75.75 0 01.75.75V21m-4.5 0H2.36m11.14 0H18m0 0h3.64m-1.39 0V9.349m-16.5 11.65V9.35m0 0a3.001 3.001 0 003.75-.615A2.993 2.993 0 009.75 9.75c.896 0 1.7-.393 2.25-1.016a2.993 2.993 0 002.25 1.016c.896 0 1.7-.393 2.25-1.016a3.001 3.001 0 003.75.614m-16.5 0a3.004 3.004 0 01-.621-4.72L4.318 3.44A1.5 1.5 0 015.378 3h13.243a1.5 1.5 0 011.06.44l1.19 1.189a3 3 0 01-.621 4.72m-13.5 8.65h3.75a.75.75 0 00.75-.75V13.5a.75.75 0 00-.75-.75H6.75a.75.75 0 00-.75.75v3.75c0 .415.336.75.75.75z" />
                </svg>
            </div>
            <div>
                <p class="font-bold text-slate-700 text-lg">Negocios</p>
                <p class="text-slate-700 opacity-50 font-bold text-sm">Cantidad: {{ $users->filter(function ($user) {
                    return $user->hasRole('negocio');
                })->count() }}</p>
            </div>
        </a>

    </div>

@endsection

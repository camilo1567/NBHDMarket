@extends('layouts.superadmin.app')

@section('content')

    <div class="md:flex w-full">
        <div class="flex bg-white p-4 m-2 md:w-1/4 rounded-lg">
            <div class="text-white bg-gradient-to-tl from-purple-700 h-12 w-12 to-pink-500 mr-2 flex items-center justify-center rounded-lg bg-white bg-center stroke-0 text-center xl:p-2">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M15 19.128a9.38 9.38 0 002.625.372 9.337 9.337 0 004.121-.952 4.125 4.125 0 00-7.533-2.493M15 19.128v-.003c0-1.113-.285-2.16-.786-3.07M15 19.128v.106A12.318 12.318 0 018.624 21c-2.331 0-4.512-.645-6.374-1.766l-.001-.109a6.375 6.375 0 0111.964-3.07M12 6.375a3.375 3.375 0 11-6.75 0 3.375 3.375 0 016.75 0zm8.25 2.25a2.625 2.625 0 11-5.25 0 2.625 2.625 0 015.25 0z" />
                </svg>
            </div>
            <div>
                <p class="font-bold text-slate-700 text-lg">Usuarios</p>
                <p class="text-slate-700 opacity-50 font-bold text-sm">Cantidad: {{ count($users) }}</p>
            </div>

        </div>

        <div class="bg-white p-4 m-2 md:w-1/4 rounded-lg">
            Mundo
        </div>

        <div class="bg-white p-4 m-2 md:w-1/4 rounded-lg">
            Laravel
        </div>

        <div class="bg-white p-4 m-2 md:w-1/4 rounded-lg">
            Otro
        </div>
    </div>

@endsection

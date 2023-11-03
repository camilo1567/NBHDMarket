@extends('layouts.superadmin.app')

@section('titulo')
    Editar Contacto
@endsection

@section('content')

    <div class="py-2">

        <div class="flex justify-start">
            <a href="{{ route('superadmin.contacts.index') }}" class="btn-primary">

                Regresar

            </a>
        </div>
    </div>

    <div class="p-6 bg-white rounded-lg">

        {{ Aire::open()->route('superadmin.contacts.update', $contact) }}

        <div class="md:flex gap-2 md:grid-cols-2">

                {{ Aire::input('nombre','Nombre')->value($contact->nombre) }}
                {{ Aire::input('apellido','Apellido')->value($contact->apellido) }}
                {{ Aire::input('email','Email')->value($contact->email) }}
                {{ Aire::input('telefono','Telefono')->value($contact->telefono) }}
                
        </div>

        <div class="flex justify-end py-2">
            {{ Aire::submit('Editar')->class('btn-new') }}
        </div>
        {{ Aire::close() }}

    </div>

@endsection

@extends('layouts.superadmin.app')

@section('titulo')
    Categories
@endsection

@section('content')


    <div class="py-2">
        <div class="flex justify-start">
            <a href="{{ route('superadmin.categories.create') }}" class="btn-primary">
                Nuevo
            </a>
        </div>
    </div>

    <div class="container-table">
        <div class="container-table-div">
            <table class="table-template">
                <thead>
                    <tr>
                        <th class="text-left th-template">Nombre</th>
                        <th class="text-center th-template">Sub Categorias</th>
                        <th class="text-center th-template"></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($categories as $category)
                        <tr>
                            <td class="td-template">
                                {{ $category->nombre }}
                            </td>

                            <td class="td-template text-center">
                                {{ $category->subcategories->count() }}
                            </td>

                            <td class="flex justify-end td-template">
                                <div class="flex gap-2">
                                    <a href="{{ route('superadmin.subcategories.index',$category) }}" class="btn-warning">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M9.568 3H5.25A2.25 2.25 0 003 5.25v4.318c0 .597.237 1.17.659 1.591l9.581 9.581c.699.699 1.78.872 2.607.33a18.095 18.095 0 005.223-5.223c.542-.827.369-1.908-.33-2.607L11.16 3.66A2.25 2.25 0 009.568 3z" />
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M6 6h.008v.008H6V6z" />
                                        </svg>

                                        Sub Categorias
                                    </a>
                                    <a href="{{ route('superadmin.categories.edit',$category) }}" class="btn-primary">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="w-5 h-5">
                                            <path d="M5.433 13.917l1.262-3.155A4 4 0 017.58 9.42l6.92-6.918a2.121 2.121 0 013 3l-6.92 6.918c-.383.383-.84.685-1.343.886l-3.154 1.262a.5.5 0 01-.65-.65z" />
                                            <path d="M3.5 5.75c0-.69.56-1.25 1.25-1.25H10A.75.75 0 0010 3H4.75A2.75 2.75 0 002 5.75v9.5A2.75 2.75 0 004.75 18h9.5A2.75 2.75 0 0017 15.25V10a.75.75 0 00-1.5 0v5.25c0 .69-.56 1.25-1.25 1.25h-9.5c-.69 0-1.25-.56-1.25-1.25v-9.5z" />
                                        </svg>

                                        Editar
                                    </a>

                                    {{ Aire::open()->route('superadmin.categories.destroy', $category) }}
                                        <button type="submit" class="btn-secondary" onclick="return confirm('¿Seguro que desea eliminar esta categoria?')">
                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="w-5 h-5">
                                                <path fill-rule="evenodd" d="M8.75 1A2.75 2.75 0 006 3.75v.443c-.795.077-1.584.176-2.365.298a.75.75 0 10.23 1.482l.149-.022.841 10.518A2.75 2.75 0 007.596 19h4.807a2.75 2.75 0 002.742-2.53l.841-10.52.149.023a.75.75 0 00.23-1.482A41.03 41.03 0 0014 4.193V3.75A2.75 2.75 0 0011.25 1h-2.5zM10 4c.84 0 1.673.025 2.5.075V3.75c0-.69-.56-1.25-1.25-1.25h-2.5c-.69 0-1.25.56-1.25 1.25v.325C8.327 4.025 9.16 4 10 4zM8.58 7.72a.75.75 0 00-1.5.06l.3 7.5a.75.75 0 101.5-.06l-.3-7.5zm4.34.06a.75.75 0 10-1.5-.06l-.3 7.5a.75.75 0 101.5.06l.3-7.5z" clip-rule="evenodd" />
                                            </svg>
                                            Eliminar
                                        </button>
                                    {{ Aire::close() }}
                                </div>
                            </td>

                        </tr>
                    @endforeach
                </tbody>
            </table>

        </div>

    </div>

@endsection

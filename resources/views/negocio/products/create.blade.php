@extends('layouts.negocio.app')

@section('titulo')
    Productos
@endsection

@section('content')
    <div class="py-2">

        <div class="flex justify-start">
            <a href="{{ route('negocio.products.index') }}" class="btn-primary">

                Regresar

            </a>
        </div>

    </div>

    <div class="p-6 bg-white rounded-lg">
        <div class="px-10 ">
            {{ Aire::open()->route('negocio.products.store')->encType('multipart/form-data') }}

            {{ Aire::file('archivo', 'Imagen')->class('w-full md:w-1/2') }}

            <div class="gap-2 grid md:grid-cols-2">

                {{ Aire::input('nombre', 'Nombre') }}

                {{ Aire::number('precio', 'Precio') }}

                {{ Aire::number('cantidad', 'Cantidad') }}

                {{ Aire::select(['' => 'Seleccione una categoria']+$categorias->pluck('nombre','id')->toArray(),'category','Categorias')->id('category') }}

                {{ Aire::select([], 'subcategory_id', 'Subcategorias')->id('subcategory') }}

            </div>

            {{ Aire::textarea('descripcion', 'Descripción') }}


            <div class="flex justify-end py-2">
                {{ Aire::submit('Crear')->class('btn-new') }}
            </div>

            {{ Aire::close() }}
        </div>
    </div>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
    $('#category').change(function() {
        var categoryId = $(this).val();
        var subcategorySelect = $('#subcategory');
        subcategorySelect.empty();

        if (!categoryId) {
            return;
        }

        $.get('/negocio/subcategories/' + categoryId, function(data) {
            console.log(data); // Imprime los datos recibidos en la consola
            $.each(data, function(index, subcategory) {
                subcategorySelect.append(new Option(subcategory.nombre, subcategory.id));
            });
        })
        .fail(function(error) {
            console.log(error); // Imprime cualquier error en la consola
        });
    });
</script>
@endsection

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

        {{ Aire::open()->route('negocio.products.update', $product)->encType('multipart/form-data') }}

        <div class="gap-2">

            <div class="flex mb-2">

                <div class="md:w-1/2">
                    <img class="h-[250px]" src="{{ asset('storage/'.$product->imagen) }}" alt="{{ $product->nombre }}" />
                </div>


                <div class="md:w-1/2">

                    {{ Aire::file('archivo','Imagen')->value($product->imagen) }}

                </div>

            </div>



            <div class="grid gap-2 md:grid-cols-2">

                {{ Aire::input('nombre', 'Nombre')->value($product->nombre) }}

                {{ Aire::input('precio', 'Precio')->value($product->precio) }}

                {{ Aire::input('cantidad', 'Cantidad')->value($product->cantidad) }}

                {{ Aire::select(['' => 'Seleccione una categoria']+$categorias->pluck('nombre','id')->toArray(),'category','Categorias')->id('category') }}

                {{ Aire::select([], 'subcategoria_id', 'Subcategorias')->id('subcategory') }}

            </div>

            {{ Aire::textarea('descripcion', 'Descripcion')->value($product->descripcion) }}

        </div>

        <div class="flex justify-end py-2">
            {{ Aire::submit('Editar')->class('btn-new') }}
        </div>

        {{ Aire::close() }}


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

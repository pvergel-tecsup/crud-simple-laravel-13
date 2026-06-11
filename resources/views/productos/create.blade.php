@extends('layouts.principal')

@section('contenido')
<h2>Nuevo Producto</h2>
@if ($errors->any())
    <div>
        Se encontraron los siguientes errores:
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
<form action="{{ route('productos.store') }}" method="post">
    @csrf
    <label for="nombre">Nombre</label>
    <input type="text" name="nombre" autocomplete="off" required><br>

    <label for="precio">Precio</label>
    <input type="number" name="precio" autocomplete="off" required><br>

    <label for="stock">Stock</label>
    <input type="number" name="stock" autocomplete="off" required><br>

    <label for="id_categoria">Categoría</label>
    <select name="id_categoria">
        <option value="">[ SELECCIONE ]</option>
        @foreach ($categorias as $cat)
            <option value="{{ $cat->id }}">{{ $cat->descripcion }}</option>
        @endforeach
    </select><br>

    <button type="submit">Enviar</button>
    <a href="{{ route('productos.index') }}">Regresar</a>
</form>
@endsection
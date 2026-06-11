@extends('layouts.principal')

@section('contenido')
<h2>Editar Producto</h2>
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
<form action="{{ route('productos.update', ['producto' => $producto->id_producto]) }}" method="post">
    @csrf
    @method('PATCH')
    <label for="nombre">Nombre</label>
    <input type="text" name="nombre" autocomplete="off" required value="{{ $producto->nombre }}"><br>

    <label for="precio">Precio</label>
    <input type="number" name="precio" autocomplete="off" required value="{{ $producto->precio }}"><br>

    <label for="stock">Stock</label>
    <input type="number" name="stock" autocomplete="off" required value="{{ $producto->stock }}"><br>

    <label for="id_categoria">Categoría</label>
    <select name="id_categoria" required>
        @foreach ($categorias as $cat)
            <option value="{{ $cat->id }}" @if ($cat->id == $producto->id_categoria)
                {{ "selected" }}
            @endif>{{ $cat->descripcion }}</option>
        @endforeach
    </select><br>

    <button type="submit">Enviar</button>
    <a href="{{ route('productos.index') }}">Regresar</a>
</form>
@endsection
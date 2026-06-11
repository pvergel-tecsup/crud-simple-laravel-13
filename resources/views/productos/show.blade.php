@extends('layouts.principal')

@section('contenido')
    <h2>Detalle de Producto</h2>
    <label for="nombre">Nombre</label>
    <input type="text" name="nombre" readonly value="{{ $producto->nombre }}"><br>

    <label for="precio">Precio</label>
    <input type="number" name="precio" readonly value="{{ $producto->precio }}"><br>

    <label for="stock">Stock</label>
    <input type="number" name="stock" readonly value="{{ $producto->stock }}"><br>

    <label for="marca">Categoría</label>
    <input type="text" name="categoria" readonly value="{{ $producto->categoria->descripcion }}"><br>
    
    <a href="">Editar</a>
    <a href="{{ route('productos.index') }}">Regresar</a>
@endsection
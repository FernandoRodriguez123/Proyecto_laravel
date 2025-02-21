<!-- resources/views/productos/index.blade.php -->

@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Lista de Productos</h1>

        <!-- Mostrar mensaje de éxito si hay -->
        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <a href="{{ route('productos.create') }}" class="btn btn-primary mb-3">Crear Producto</a>

        @foreach($productos as $producto)
            <div class="mb-4">
                <h3>{{ $producto->nombre }}</h3>
                <p>Categoría: {{ $producto->categoria }}</p>
                <p>Stock: {{ $producto->stock }}</p>
                <p>Supermercado: {{ $producto->supermercado->nombre }}</p>
                <p>Precio: ${{ $producto->precio }}</p>
                <p>Fecha de caducidad: {{ $producto->fecha_caducidad }}</p>

                <a href="{{ route('productos.edit', $producto) }}" class="btn btn-warning">Editar</a>

                <form action="{{ route('productos.destroy', $producto) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Eliminar</button>
                </form>
            </div>
        @endforeach
    </div>
@endsection

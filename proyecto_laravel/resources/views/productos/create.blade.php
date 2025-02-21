<!-- resources/views/productos/create.blade.php -->

@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Crear Producto</h1>

        <form action="{{ route('productos.store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="nombre" class="form-label">Nombre</label>
                <input type="text" name="nombre" class="form-control" id="nombre" required>
            </div>
            <div class="mb-3">
                <label for="categoria" class="form-label">Categoría</label>
                <input type="text" name="categoria" class="form-control" id="categoria" required>
            </div>
            <div class="mb-3">
                <label for="stock" class="form-label">Stock</label>
                <input type="number" name="stock" class="form-control" id="stock" required>
            </div>
            <div class="mb-3">
                <label for="supermercado_id" class="form-label">Supermercado</label>
                <select name="supermercado_id" class="form-control" required>
                    @foreach($supermercados as $supermercado)
                        <option value="{{ $supermercado->id }}">{{ $supermercado->nombre }}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label for="fecha_caducidad" class="form-label">Fecha de caducidad</label>
                <input type="date" name="fecha_caducidad" class="form-control" id="fecha_caducidad" required>
            </div>
            <div class="mb-3">
                <label for="precio" class="form-label">Precio</label>
                <input type="number" step="0.01" name="precio" class="form-control" id="precio" required>
            </div>
            <button type="submit" class="btn btn-primary">Crear Producto</button>
        </form>
    </div>
@endsection

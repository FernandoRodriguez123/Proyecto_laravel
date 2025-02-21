<!-- resources/views/supermercados/create.blade.php -->

@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Crear Supermercado</h1>

        <form action="{{ route('supermercados.store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="nombre" class="form-label">Nombre</label>
                <input type="text" name="nombre" class="form-control" id="nombre" required>
            </div>
            <div class="mb-3">
                <label for="direccion" class="form-label">Dirección</label>
                <input type="text" name="direccion" class="form-control" id="direccion" required>
            </div>
            <div class="mb-3">
                <label for="vigencia_contrato" class="form-label">Vigencia del Contrato</label>
                <input type="date" name="vigencia_contrato" class="form-control" id="vigencia_contrato" required>
            </div>
            <div class="mb-3">
                <label for="margen_beneficio" class="form-label">Margen de Beneficio</label>
                <input type="number" name="margen_beneficio" class="form-control" id="margen_beneficio" required>
            </div>
            <div class="mb-3">
                <label for="telefono" class="form-label">Teléfono</label>
                <input type="text" name="telefono" class="form-control" id="telefono" required>
            </div>
            <div class="mb-3">
                <label for="correo" class="form-label">Correo</label>
                <input type="email" name="correo" class="form-control" id="correo" required>
            </div>
            <button type="submit" class="btn btn-primary">Crear Supermercado</button>
        </form>
    </div>
@endsection

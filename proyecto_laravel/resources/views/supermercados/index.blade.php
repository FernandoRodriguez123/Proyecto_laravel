<!-- resources/views/supermercados/index.blade.php -->

@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Lista de Supermercados</h1>

        <!-- Mostrar mensaje de éxito si hay -->
        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <a href="{{ route('supermercados.create') }}" class="btn btn-primary mb-3">Crear Supermercado</a>

        @foreach($supermercados as $supermercado)
            <div class="mb-4">
                <h3>{{ $supermercado->nombre }}</h3>
                <p>Dirección: {{ $supermercado->direccion }}</p>
                <p>Vigencia del contrato: {{ $supermercado->vigencia_contrato }}</p>
                <p>Margen de beneficio: ${{ $supermercado->margen_beneficio }}</p>
                <p>Teléfono: {{ $supermercado->telefono }}</p>
                <p>Correo: {{ $supermercado->correo }}</p>

                <a href="{{ route('supermercados.edit', $supermercado) }}" class="btn btn-warning">Editar</a>

                <form action="{{ route('supermercados.destroy', $supermercado) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Eliminar</button>
                </form>
            </div>
        @endforeach
    </div>
@endsection


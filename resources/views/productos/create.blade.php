@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Crear Nuevo Producto</h1>

        {{-- Mostrar errores de validación si los hay --}}
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        {{-- Formulario para crear un producto --}}
        <form action="{{ route('productos.store') }}" method="POST">
            @csrf {{-- Token de seguridad requerido por Laravel --}}

            <div class="form-group">
                <label for="nombre">Nombre del Producto:</label>
                <input type="text" class="form-control" id="nombre" name="nombre" value="{{ old('nombre') }}" required>
            </div>

            <div class="form-group">
                <label for="descripcion">Descripción:</label>
                <textarea class="form-control" id="descripcion" name="descripcion" rows="4">{{ old('descripcion') }}</textarea>
            </div>
            
            <div class="form-group">
                <label for="precio">Precio:</label>
                <input type="number" step="0.01" class="form-control" id="precio" name="precio" value="{{ old('precio') }}" required>
            </div>

            <button type="submit" class="btn btn-primary">Guardar Producto</button>
        </form>

        {{-- Botón para regresar a la lista de productos --}}
        <a href="{{ route('productos.index') }}" class="btn btn-secondary mt-3">Regresar</a>
    </div>
@endsection

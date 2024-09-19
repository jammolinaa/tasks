@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Crear Nuevo tasks</h1>

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
        <form action="{{ route('tasks.store') }}" method="POST">
            @csrf {{-- Token de seguridad requerido por Laravel --}}

            <div class="form-group">
                <label for="title">Title:</label>
                <input type="text" class="form-control" id="title" name="title" value="{{ old('title') }}" required>
            </div>

            <div class="form-group">
                <label for="body"> Body:</label>
                <textarea class="form-control" id="body" name="body" rows="4">{{ old('body') }}</textarea>
            </div>

            <button type="submit" class="btn btn-primary">Guardar tasks</button>
        </form>

        {{-- Botón para regresar a la lista de productos --}}
        <a href="{{ route('productos.index') }}" class="btn btn-secondary mt-3">Regresar</a>
    </div>
@endsection

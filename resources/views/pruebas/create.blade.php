@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Crear Nuevo pruebas</h1>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('pruebas.store') }}" method="POST">
            @csrf 
            <div>
                <div class="form-group">
                    <label for="nombre">nombre:</label>
                    <input type="text" class="form-control" id="nombre" name="nombre" value="{{ old('nombre') }}" required>
                </div>
                <div class="form-group">
                    <label for="apellido"> apellido:</label>
                    <input class="form-control" id="apellido" name="apellido" rows="4">{{ old('apellido') }}</input>
                </div>
                <div class="form-group">
                    <label for="edad"> edad:</label>
                    <input class="form-control" id="edad" name="edad" rows="4">{{ old('edad') }}</input>
                </div>
            </div>
            <button type="submit" class="btn btn-primary">Guardar prueba</button>
        </form>

        {{-- Botón para regresar a la lista de productos --}}
        <a href="{{ route('pruebas.index') }}" class="btn btn-secondary mt-3">Regresar</a>
    </div>
@endsection

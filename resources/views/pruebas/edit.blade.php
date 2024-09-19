@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Editar prueba</h1>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('pruebas.update', $prueba->id) }}" method="POST">
            @csrf 
            @method('PUT') 

            <div class="form-group">
                <label for="nombre">nombre:</label>
                <input type="text" class="form-control" id="nombre" name="nombre" value="{{ old('nombre', $prueba->nombre) }}" required>
            </div>

            <div class="form-group">
                <label for="apellido">apellido:</label>
                <input class="form-control" id="apellido" name="apellido" rows="4" value=" {{ old('apellido', $prueba->apellido) }}" >
            </div>
            <div class="form-group">
                <label for="edad">edad:</label>
                <input class="form-control" id="edad" name="edad" rows="4" value ="{{ old('edad', $prueba->edad) }}">
            </div>

            <button type="submit" class="btn btn-primary">Actualizar prueba</button>
        </form>

        <a href="{{ route('pruebas.index') }}" class="btn btn-secondary mt-3">Regresar</a>
    </div>
@endsection

@extends('layouts.layouts')

@section('content')
    <div class="container">
        <h1>Lista de pruebas</h1>
        <a href="{{ route('pruebas.create') }}" class="btn btn-primary mb-3">Crear pruebas</a>

        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>nokmbre</th>
                    <th>apellido</th>
                    <th>Edad</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>

                @foreach($pruebas as $prueba)
                    <tr>
                        <td>{{ $prueba->id }}</td>
                        <td>{{ $prueba->nombre }}</td>
                        <td>{{ $prueba->apellido }}</td>
                        <td>{{ $prueba->edad }}</td>
                        <td>
                            {{-- Botón para editar --}}
                            <a href="{{ route('pruebas.edit', $prueba->id) }}" class="btn btn-sm btn-warning">Editar</a>

                            {{-- Formulario para eliminar --}}
                             <form action="{{ route('pruebas.destroy', $prueba->id) }}" method="POST" style="display:inline-block;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger">Eliminar</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        {{-- Mensaje si no hay tasks --}}
        @if($pruebas->isEmpty())
            <p>No hay tasks disponibles.</p>
        @endif
    </div>
@endsection

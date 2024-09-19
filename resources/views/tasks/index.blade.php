@extends('layouts.layouts') <!-- Extiende la plantilla base -->

@section('title', 'Lista de Tasks') <!-- (Opcional) Título para esta página específica -->

@section('content')
    <div class="container">
        <div class="container">
            <h1>Lista de Tasks</h1>

            <!-- Button trigger modal -->
            <button type="button" class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#exampleModal">
                Crear Tasks
            </button>

            <!-- Modal -->
            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h2 class="modal-title" id="exampleModalLabel"> Nueva Tarea </h2>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
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
                        </div>

                    </div>
                </div>
            </div>








            {{-- Tabla de tasks --}}
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Title</th>
                        <th>Body</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($tasks as $task)
                        <tr>
                            <td>{{ $task->id }}</td>
                            <td>{{ $task->title }}</td>
                            <td>{{ $task->body }}</td>
                            <td>
                                {{-- Botón para editar --}}
                                <a href="{{ route('tasks.edit', $task->id) }}" class="btn btn-sm btn-warning">Editar</a>

                                {{-- Formulario para eliminar --}}
                                <form action="{{ route('tasks.destroy', $task->id) }}" method="POST"
                                    style="display:inline-block;">
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
            @if ($tasks->isEmpty())
                <p>No hay tasks disponibles.</p>
            @endif
        </div>
    @endsection

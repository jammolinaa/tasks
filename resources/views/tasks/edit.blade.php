@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Editar Task</h1>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('tasks.update', $task->id) }}" method="POST">
            @csrf 
            @method('PUT') 

            <div class="form-group">
                <label for="title">Title:</label>
                <input type="text" class="form-control" id="title" name="title" value="{{ old('title', $task->title) }}" required>
            </div>

            <div class="form-group">
                <label for="body">Body:</label>
                <textarea class="form-control" id="body" name="body" rows="4">{{ old('body', $task->body) }}</textarea>
            </div>

            <button type="submit" class="btn btn-primary">Actualizar Task</button>
        </form>

        <a href="{{ route('tasks.index') }}" class="btn btn-secondary mt-3">Regresar</a>
    </div>
@endsection

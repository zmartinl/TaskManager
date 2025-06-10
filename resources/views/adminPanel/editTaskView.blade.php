@extends('layout')

@section('title', 'Editor de Tarea')

@section('content')
    <div class="row justify-content-center mt-4">
        <div class="col-md-8">
            <form action="{{ route('taskEdited') }}" method="POST" id="taskForm">
                @csrf
                <div class="card" style="min-height: 50vh;">
                    <div class="card-body">
                        <h5 class="card-title text-center fs-5 mt-2">Editando Tarea de {{ $task->user_name }}</h5>
                        <div class="form-group mt-4">
                            <input type="hidden" name="task_id" value="{{ $task->id }}">
                            <label for="name">Nombre de la Tarea</label>
                            <input type="text" class="form-control" id="name" value="{{ $task->name }}" disabled>
                        </div>
                        <div class="form-group mt-3">
                            <label for="description">Descripción de la Tarea</label>
                            <textarea class="form-control" id="description" name="description" rows="3">{{ $task->description }}</textarea>
                        </div>
                        <div class="form-group mt-3">
                            <label for="user">Asignar a Usuario</label>
                            <select class="form-control" id="user" name="user">
                                @foreach ($users as $user)
                                    <option value="{{ $user->id }}" {{ $user->id == $task->user_id ? 'selected' : '' }}>
                                        {{ $user->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group mt-3">
                            <label for="priority">Prioridad</label>
                            <select class="form-control" id="priority" name="priority" required>
                                @foreach ($priorities as $priority)
                                    <option value="{{ $priority->id }}" {{ $task->priority_id == $priority->id ? 'selected' : '' }}>
                                        {{ $priority->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group mt-3">
                            <label for="date">Fecha de Entrega</label>
                            <input type="date" class="form-control" id="dateEdit" name="date" value="{{ $task->deadline }}">
                        </div>

                        <div class="d-flex justify-content-center mt-4">
                            <button type="submit" class="btn btn-primary confirmEdit">Editar Tarea</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
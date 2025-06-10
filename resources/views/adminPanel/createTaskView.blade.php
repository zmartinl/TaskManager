@extends('layout')

@section('title', 'Creador de Tarea')

@section('content')
    <div class="row justify-content-center mt-4">
        <div class="col-md-8">
            @if ($errors->any())
                @foreach ($errors->all() as $error)
                <script>
                    Swal.fire({
                        title: "¡Error!",
                        text: "{{ $error }}",
                        icon: "error",
                    });
                </script>
                @endforeach
            @endif

            <!-- Mostrar mensaje de éxito con SweetAlert -->
            @if(session('success'))
                <script>
                    Swal.fire({
                        title: "¡Tarea Creada!",        
                        text: "{{ session('success') }}",
                        icon: "success",
                        confirmButtonText: "OK"
                    });
                </script>
            @endif

            <form action="{{ route('taskCreated') }}" method="POST" id="taskForm">
                @csrf
                <div class="card" style="min-height: 50vh;">
                    <div class="card-body">
                        <h5 class="card-title text-center fs-5 mt-2">Crear Nueva Tarea</h5>
                        <div class="form-group mt-4">
                            <label for="name">Nombre de la Tarea</label>
                            <input type="text" class="form-control" id="nameCreate" name="name" value="">
                        </div>
                        <div class="form-group mt-3">
                            <label for="description">Descripción de la Tarea</label>
                            <textarea class="form-control" id="description" name="description" rows="3"></textarea>
                        </div>
                        <div class="form-group mt-3">
                            <label for="user">Asignar a Usuario</label>
                            <select class="form-control" id="user" name="user">
                                <option value="" selected disabled hidden>Selecciona usuario a asignar</option>
                                @foreach($users as $user)
                                    <option value="{{ $user->id }}">{{ $user->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group mt-3">
                            <label for="priority">Prioridad</label>
                            <select class="form-control" id="priority" name="priority">
                                <option value="" selected disabled hidden>Selecciona que tipo de emergencia tiene la tarea</option>
                                @foreach ($priorities as $priority)
                                    <option value="{{ $priority->id }}">{{ $priority->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group mt-3">
                            <label for="date">Fecha de Entrega</label>
                            <input type="date" class="form-control" id="dateCreate" name="date">
                        </div>

                        <div class="d-flex justify-content-center mt-4">
                            <button id="createTask" type="submit" class="btn btn-primary">Crear Tarea</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection

@extends('layout')

@section('title', 'Histórico de Tareas')

@section('content')
    <div class="d-flex justify-content-center titUser">
        <h1 class="fs-4 text-white mt-1">Historial de Tareas Realizadas</h1>
    </div>
    <div class="row justify-content-center mt-5">
        @foreach ($tasks as $userName => $userTasks)
        <div class="col-md-4">
            <div class="card card2" style="min-height: 50vh;">
                <div class="card-body">
                    <h5 class="card-title text-center fs-5 mt-1">Tareas de {{ $userName }}</h5>
                    <div class="row">
                        @foreach ($userTasks as $task)
                            @if ($task->status_id == 1)
                            <div class="col-12 mb-3">
                                <div class="card" style="min-height: 45vh;">
                                    <div class="card-body">
                                        <h6 class="card-title text-center fw-bold">{{ $task->name }}</h6>
                                        <div class="row">
                                            <div class="col-12">
                                                @if(!empty($task->description))
                                                    <p><span class="fw-bold">Descripción:</span> {{ $task->description }}</p>
                                                @endif
                                            </div>
                                            <div>
                                                <p><span class="fw-bold">Fecha de Inicio:</span> {{ $task->start_date }}</p>
                                                <p><span class="fw-bold">Fecha de Finalización:</span> {{ $task->end_date }}</p>
                                            </div>
                                            <div class="col-12">
                                                <p>
                                                    <span class="fw-bold">Prioridad:</span>
                                                    <span class="badge 
                                                        @if($task->priority_id == 1) bg-danger 
                                                        @elseif($task->priority_id == 2) bg-warning 
                                                        @elseif($task->priority_id == 3) bg-info
                                                        @else bg-success @endif">
                                                        {{ $task->priority_name }}
                                                    </span>
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endif
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
@endsection

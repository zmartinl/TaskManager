@extends('layout')

@section('title', 'Panel de Usuario')

@section('content')
    <div class="row justify-content-center mt-5">
        @foreach ($tasks as $userName => $userTasks)
        <div class="col-md-4">
            <div class="card card2" style="min-height: 70vh;">
                <div class="card-body">
                    <h5 class="card-title text-center fs-5 mt-1">Tareas de {{ $userName }}</h5>
                    <div class="row">
                        @foreach ($userTasks as $task)
                        <div class="col-12 mb-3">
                            <div class="card" style="min-height: 25vh;">
                                <div class="card-body">
                                    <h6 class="card-title text-center fw-bold">{{ $task->name }}</h6>
                                    <div class="row">
                                        <div class="col-12">
                                            @if(!empty($task->description))
                                                <p><span class="fw-bold">Descripción:</span> {{ $task->description }}</p>
                                            @endif
                                            <p><span class="fw-bold">Fecha Entrega:</span> {{ $task->deadline }}</p>
                                        </div>
                                        <div class="col-6">
                                            <p>
                                                <span class="fw-bold">Status:</span>
                                                <span class="badge 
                                                    @if($task->status_id == 1) bg-success 
                                                    @elseif($task->status_id == 2) bg-warning 
                                                    @else bg-danger @endif">
                                                    @if($task->status_id == 1) Completado
                                                    @elseif($task->status_id == 2) En Progreso
                                                    @else No Comenzada @endif
                                                </span>
                                            </p>
                                        </div>
                                        <div class="col-6">
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
                                    <div class="d-flex justify-content-center mt-3">
                                        @include('components/buttons/btnTasks')
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
        @endforeach
@endsection

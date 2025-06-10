@extends('layout')

@section('title', 'Panel Administrador')

@section('content')
    <div class="d-flex justify-content-center titAdmin">
        <h1 class="fs-2 text-white">Bienvenido a tu Panel Administrador</h1>
    </div>
    <div class="row justify-content-center mt-5">
        <div class="col-md-5">
            <a href="{{ route('createTask') }}" class="noUnderline">
                <div class="card card2" style="min-height: 50vh;">
                    <div class="card-body">
                        <h5 class="card-title text-center fs-5 mt-4">Crear Nueva Tarea</h5>
                        <div class="d-flex justify-content-center align-items-center mt-5">
                            <span class="card-text"><i class="fa-solid fa-plus"></i></span>
                        </div>
                    </div>
                </div>
            </a>
        </div>
        <div class="col-md-5">
            <a href="{{ route('menuEditTask') }}" class="noUnderline">
                <div class="card card2" style="min-height: 50vh;">
                    <div class="card-body">
                        <h5 class="card-title text-center fs-5 mt-4">Editar Tareas</h5>
                        <div class="d-flex justify-content-center align-items-center mt-5">
                            <span class="card-text"><i class="fa-solid fa-edit"></i></span>
                        </div>
                    </div>
                </div>
            </a>
        </div>
    </div>
@endsection


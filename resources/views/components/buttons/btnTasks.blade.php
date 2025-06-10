@if($task->status_id == 1)
    <button class="btn btn-secondary" disabled>Tarea Completada</button>
@elseif($task->status_id == 3 && $task->deadline < now())
    <button class="btn btn-danger" disabled>Expirada</button>
@elseif($task->status_id == 3)
    <form action="{{ route('startTask',['id' => $task->id] ) }}" method="POST">
        @csrf
        <button type="submit" class="btn btn-warning">Empezar Tarea</button>
    </form>
@elseif($task->status_id == 2)
    <form action="{{ route('completeTask', ['id' => $task->id]) }}" method="POST">
        @csrf
        <button type="submit" class="btn btn-success">Completar Tarea</button>
    </form>
@endif
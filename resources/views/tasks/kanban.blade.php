@extends('home')

@section('content-home')
    {{-- creamos la alerta a travez de sessiones --}}
    @if (session('success'))
        <div class="position-fixed top-0 end-0 p-3" style="z-index: 1055">
            <div id="toastSuccess" class="toast align-items-center text-white bg-success border-0 show" role="alert" aria-live="assertive" aria-atomic="true">
                <div class="d-flex">
                    <div class="toast-body">
                        {{ session('success') }}
                    </div>
                    <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
                </div>
            </div>
        </div>
    @endif

    <h6 class="text-success">{{ $saludo }}</h6>
    <h1 class="title">Proyecto Kanban FSJ32</h1>
    <h2 class="subtitle">Gestiona tus tareas utilizando el tablero Kanban que aparece a continuación.</h2>

    <a href="{{ url('/tasks/create') }}" class="btn btn-primary mb-4"><i class="bi bi-bookmark-plus-fill"></i> Registrar Tarea</a>

    <section class="kanban-board">
        <div class="kanban-column">
            <h3>Pending</h3>

            @foreach ($tasks->where('status', 'pendiente') as $item)
                <div class="kanban-card">
                    <strong>{{ $item->title }}</strong>
                    <p class="m-0"><small><b>Usuario Asignado:</b> {{ $item->user }}</small></p>
                    <p class="m-0"><small><b>Estado: </b> {{ $item->status }}</small></p>
                    <p class="m-0"><small><b>Prioridad: </b> {{ $item->priority }}</small></p>
                    <p class="m-0"><small><b>Fecha Limite: </b> {{ $item->due_date }}</small></p>
                    <div>
                        <a href="{{ route('tasks.edit', $item->id) }}" class="btn btn-warning btn-sm mt-1"><i class="bi bi-pencil-square"></i></a>
                    </div>
                </div>
            @endforeach
        </div>
        <div class="kanban-column">
            <h3>In Progress</h3>
            @foreach ($tasks->where('status', 'en proceso') as $item)
                <div class="kanban-card">
                    <strong>{{ $item->title }}</strong>
                    <p class="m-0"><small><b>Usuario Asignado:</b> {{ $item->user }}</small></p>
                    <p class="m-0"><small><b>Estado: </b> {{ $item->status }}</small></p>
                    <p class="m-0"><small><b>Prioridad: </b> {{ $item->priority }}</small></p>
                    <p class="m-0"><small><b>Fecha Limite: </b> {{ $item->due_date }}</small></p>
                    <div>
                        <a href="{{ route('tasks.edit', $item->id) }}" class="btn btn-warning btn-sm mt-1"><i class="bi bi-pencil-square"></i></a>
                    </div>
                </div>
            @endforeach
        </div>
        <div class="kanban-column">
            <h3>Completed</h3>
            @foreach ($tasks->where('status', 'completado') as $item)
                <div class="kanban-card">
                    <strong>{{ $item->title }}</strong>
                    <p class="m-0"><small><b>Usuario Asignado:</b> {{ $item->user }}</small></p>
                    <p class="m-0"><small><b>Estado: </b> {{ $item->status }}</small></p>
                    <p class="m-0"><small><b>Prioridad: </b> {{ $item->priority }}</small></p>
                    <p class="m-0"><small><b>Fecha Limite: </b> {{ $item->due_date }}</small></p>
                </div>
            @endforeach
        </div>
    </section>
@endsection
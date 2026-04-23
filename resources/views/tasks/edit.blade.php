@extends('home')

@section('content-home')
{{-- @php
    dd($task)
@endphp --}}

<div class="form-container">
    <h2 class="form-title">Editar Tarea</h2>
    <form method="POST" action="{{ route('tasks.update', $task->id) }}">
        @method('PATCH')
        @csrf
        <label class="form-label" for="title">Titulo</label>
        <input class="form-input" type="text" id="title" name="title" placeholder="Enter task" value="{{ $task->title }}">
        @error('title')
            <small class="text-danger fw-bold">{{ $message }}</small>
        @enderror
        
        <label class="form-label" for="description">Descripcion</label>
        <textarea class="form-textarea" id="description" name="description" placeholder="Enter task description">{{ $task->description }}</textarea>
        @error('description')
            <small class="text-danger fw-bold">{{ $message }}</small>
        @enderror
        

        <label class="form-label" for="due_date">Fecha Limite</label>
        <input class="form-input" type="date" id="due_date" name="due_date" value="{{ $task->due_date }}">
        @error('due_date')
            <small class="text-danger fw-bold">{{ $message }}</small>
        @enderror

        <div class="form-actions">
            <a href="#" class="btn-cancel" type="button">Cancel</a>
            <button class="btn-submit" type="submit">Update Task</button>
        </div>
    </form>
</div>
@endsection
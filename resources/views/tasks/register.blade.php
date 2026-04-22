@extends('home')

@section('content-home')

<div class="form-container">
    <h2 class="form-title">Crear Tarea</h2>
    <form method="POST" action="">
        <label class="form-label" for="title">Titulo</label>
        <input class="form-input" type="text" id="title" name="title" placeholder="Enter task" value="{{old('title')}}">
        
        <label class="form-label" for="description">Descripcion</label>
        <textarea class="form-textarea" id="description" name="description" placeholder="Enter task description">{{old('description')}}</textarea>
        
        <label class="form-label" for="due_date">Fecha Limite</label>
        <input class="form-input" type="date" id="due_date" name="due_date" value="{{old('due_date')}}">

        <label class="form-label" for="assignee">Asignar Usuario</label>
        <select class="form-select" id="assignee" name="user_id">
            <option value=""></option>
        </select>

        <label class="form-label" for="status">Estado</label>
        <select class="form-select" id="status" name="status" required>
            <option value="pendiente">pendiente</option>
            <option value="en proceso">en proceso</option>
            <option value="completada">completada</option>
        </select>

        <label class="form-label" for="priority">Prioridad</label>
        <select class="form-select" id="priority" name="priority" required>
            <option value="baja">baja</option>
            <option value="media">media</option>
            <option value="alta">alta</option>
        </select>

        <div class="form-actions">
            <a href="#" class="btn-cancel" type="button">Cancel</a>
            <button class="btn-submit" type="submit">Create Task</button>
        </div>
    </form>
</div>
@endsection
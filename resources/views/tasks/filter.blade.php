@extends('home')

@section('content-home')
    <h1 class="title">Generador de Reportes de Tareas 📄</h1>
    <h2 class="subtitle">Filtra tareas por estado y/o prioridad (opcional) para generar el PDF</h2>

    <form method="POST" action="" target="__blank">
        <div class="row g-3 align-items-end">

            <div class="col-md-5">
                <label for="status_id" class="form-label">Estado:</label>
                <select class="form-select" id="status_id" name="status_id">
                    <option value="">Todas los Estados</option> 
                    <option value="pendiente">pendiente</option>
                    <option value="en proceso">en proceso</option> 
                    <option value="completada">completada</option> 
                </select>
            </div>

            <div class="col-md-5">
                <label for="priority_id" class="form-label">Prioridad:</label>
                <select class="form-select" id="priority_id" name="priority_id">
                    <option value="">Todas las Prioridades</option>
                    <option value="alta">alta</option>
                    <option value="media">media</option> 
                    <option value="baja">baja</option> 
                </select>
            </div>
            
            <div class="col-12 col-md-2">
                <button type="submit" class="btn btn-primary w-100">Generar PDF</button>
            </div>
        </div>
    </form>
@endsection
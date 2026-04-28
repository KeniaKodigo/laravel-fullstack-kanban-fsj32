<?php

use App\Http\Controllers\PDFController;
use App\Http\Controllers\TaskController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
});

Route::get('/tasks/list', [TaskController::class, 'index'])->name('tasks.list');
Route::get('/tasks/create', [TaskController::class, 'formRegister'])->name('tasks.create');
Route::post('/tasks/save', [TaskController::class, 'store'])->name('task.save');
// ruta con parametro
Route::get('/tasks/edit/{task}', [TaskController::class, 'formEdit'])->name('tasks.edit');
// patch / put
Route::patch('/tasks/update/{taskId}', [TaskController::class, 'update'])->name('tasks.update');

// url('/tasks/list') / route('tasks.list') = ambos se utilizan para hacer llamados a las rutas

// retornarmos la vista de filtro de tareas
Route::get('/tasks/filter', function () {
    return view('tasks.filter');
});

Route::get('/tasks/report', [PDFController::class, 'generatePdfReport'])->name('tasks.report');
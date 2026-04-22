<?php

use App\Http\Controllers\TaskController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
});

Route::get('/tasks/list', [TaskController::class, 'index']);
Route::get('/tasks/create', [TaskController::class, 'formRegister']);
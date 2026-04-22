<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreTaskRequest;
use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function index(){
        //select tasks.id, tasks.title, tasks.status, tasks.priority, tasks.due_date, tasks.user_id, users.name as user from tasks inner join users on tasks.user_id = users.id  (SQL)
        $tasks = Task::select('tasks.id', 'tasks.title', 'tasks.status', 'tasks.priority', 'tasks.due_date', 'tasks.user_id', 'users.name as user')->join('users', 'tasks.user_id', '=', 'users.id')->get();

        $saludo = "Hola! desde un controlador";

        // obtener todas las tareas de la base de datos
        // Task::all(); //-> select * from tasks

        //retornamos la informacion en una vista
        return view('tasks.kanban', compact('tasks', 'saludo'));

    }


    // metodo que retorne la vista del formulario
    public function formRegister(){
        return view('tasks.register');
    }

    // crear una tarea
    public function store(StoreTaskRequest $request){
        Task::create($request->all());
        
    }
}

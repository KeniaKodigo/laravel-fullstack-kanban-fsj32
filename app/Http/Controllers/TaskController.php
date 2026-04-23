<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreTaskRequest;
use App\Http\Requests\UpdateTaskRequest;
use App\Models\Task;
use App\Models\User;
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
        //select id, name from users
        $users = User::select('id', 'name')->get();
        return view('tasks.register', compact('users'));
    }

    // crear una tarea
    public function store(StoreTaskRequest $request){
        Task::create($request->all()); //insertar datos
        return redirect()->route('tasks.list')->with('success', 'Tarea registrada exitosamente');
    }


    // retornando la vista para editar una tarea
    public function formEdit(Task $task){
        // select title, description, due_date from tasks where id = $idTask
        // $task = Task::select('title', 'description', 'due_date')->where('id',2)->get();
        // $task = Task::find($idTask); //devuelve un elemento por id
        return view('tasks.edit', compact('task'));
    }


    // actualizar una tarea por id
    public function update(UpdateTaskRequest $request, $taskId){
        // update tasks set title = ?, description = ?, due_date = ? where id = ?
        $task = Task::find($taskId);
        $task->update($request->all());
        return redirect()->route('tasks.list')->with('success', 'Se actualizaron los datos!');
    }
}

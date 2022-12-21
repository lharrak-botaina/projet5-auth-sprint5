<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TaskController extends Controller
{
    public function index()
    {
        $tasks = Task::all();   
         return view('todolist',compact('tasks'));
    }
    public function store(Request $request)
    {
        
        if (Auth::check()) {
            $task = new Task();
            $task->name_task = $request->Name ;
            $task->save();
             return redirect('/todolist');
        }
        else {
            return redirect('/login');
        }
       
    }
}

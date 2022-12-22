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
         return view('dashboard',compact('tasks'));
    }
    public function create(){
        return view('task.create');
    }
    public function store(Request $request)
    {
        
        Task::create([
            "name_task"=>$request->name_task,
        ])->save();
        return redirect('/');
       
       
    }
    public function destroy($id){
        Task::find($id)->delete();
        return back();
    }
}

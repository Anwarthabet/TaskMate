<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\User;
use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tasks = Task::all();
        return view('tasks.index', ['tasks' => $tasks]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $projects=Project::all();
        $User=User::all();
        return view('tasks.create', data: ['projects'=> $projects],mergeData: ['users'=> $User]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title'=> 'required|string|max:255',
            'description'=> 'nullable|string',
            'file'=> 'nullable|file|mimes:jpg,png,pdf,docx|max:2048',
            'status'=> 'required|in:pending,in_progress,Completed',
            'due_date'=> 'nullable|date',
            'project_id'=> 'required|exists:projects,id',
            'assigned_to'=> 'nullable',

        ]);

          Task::create(attributes: $request->all());
        return redirect()->route('tasks.index')->with('success', 'Project created successfully.');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Task $task)
    {
        $tasks = Task::all();
                $projects=Project::all();
                $user=User::all();


        return view('tasks.edit', ['task' => $task, 'tasks' => $tasks, 'projects'=> $projects, 'users'=> $user]);
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Task $task)
    {
        
        $request->validate([
            'title'=> 'required|string|max:255',
            'description'=> 'nullable|string',
            'file'=> 'nullable|file|mimes:jpg,png,pdf,docx|max:2048',
            'status'=> 'required|in:pending,in_progress,Completed',
            'due_date'=> 'nullable|date',
            'project_id'=> 'required|exists:projects,id',
            'assigned_to'=> 'nullable',

        ]);

        $task->update($request->all());

        return redirect()->route('tasks.index')->with('success', 'Task updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Task $task)
    {
        $task->delete();
        return redirect()->route('tasks.index')->with('success', 'Task deleted successfully.');
    }
}

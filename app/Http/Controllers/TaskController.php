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
            'status'=> 'required|in:pending,in-progress,completed',
            'due_date'=> 'nullable|date',
            'project_id'=> 'required|exists:projects,id',
            'assigned_to'=> 'required|exists:users,id',

        ]);

          Task::create(attributes: $request->all());
        return redirect()->route('tasks.index')->with('success', 'Project created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Task $task)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Task $task)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Task $task)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Task $task)
    {
        //
    }
}

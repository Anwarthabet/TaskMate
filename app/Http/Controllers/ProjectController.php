<?php
namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;
use App\Models\Project;


class ProjectController extends Controller
{
   public function index()
    {
        $projects = Project::all();
        return view('projects.index',['projects' => $projects]);
    }

    public function create()
    {
        $users = User::all(); // لاختيار صاحب المشروع
        return view('projects.create', compact('users'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'status' => 'required|in:pending,in_progress,completed',
            'owner_id' => 'required|exists:users,id',
        ]);

        Project::create(attributes: $request->all());

        return redirect()->route('projects.index')->with('success', 'Project created successfully.');
    }

    public function edit(Project $project)
    {
        $users = User::all(); // لاختيار صاحب المشروع
        return view('projects.edit', compact('project', 'users'));  
       
    }

    public function update(Request $request, Project $project)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'status' => 'required|in:pending,in_progress,completed',
            'owner_id' => 'required|exists:users,id',
        ]);

        $project->update($request->all());

        return redirect()->route('projects.index')->with('success', 'Project updated successfully.');
    }

    public function destroy(Project $project)
    {
        $project->delete();
        return redirect()->route('projects.index')->with('success', 'Project deleted successfully.');
    }
}

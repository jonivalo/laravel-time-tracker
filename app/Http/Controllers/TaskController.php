<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;
use App\Models\Project;

class TaskController extends Controller
{
    public function index(Project $project)
    {
        $tasks = $project->tasks;
        return view('tasks.index', compact('tasks', 'project'));
    }

    public function create(Project $project)
    {
        return view('tasks.create', compact('project'));
    }

    public function store(Request $request, Project $project)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'nullable',
        ]);

        $project->tasks()->create($request->all());

        return redirect()->route('projects.show', $project);
    }

    public function show(Project $project, Task $task)
    {
        return view('tasks.show', compact('task', 'project'));
    }

    public function edit(Project $project, Task $task)
    {
        return view('tasks.edit', compact('task', 'project'));
    }

    public function update(Request $request, Project $project, Task $task)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'nullable',
        ]);

        $task->update($request->all());

        return redirect()->route('projects.show', $project);
    }

    public function destroy(Project $project, Task $task)
    {
        $task->delete();

        return redirect()->route('projects.show', $project);
    }
}

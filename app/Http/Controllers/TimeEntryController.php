<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TimeEntry;
use App\Models\Task;

class TimeEntryController extends Controller
{
    public function index(Task $task)
    {
        $timeEntries = $task->timeEntries;
        return view('time_entries.index', compact('timeEntries', 'task'));
    }

    public function create(Task $task)
    {
        return view('time_entries.create', compact('task'));
    }

    public function store(Request $request, Task $task)
    {
        $request->validate([
            'start_time' => 'required|date',
            'end_time' => 'required|date',
            'duration' => 'required|integer',
        ]);

        $task->timeEntries()->create([
            'user_id' => auth()->id(),
            'start_time' => $request->start_time,
            'end_time' => $request->end_time,
            'duration' => $request->duration,
        ]);

        return redirect()->route('tasks.time_entries.index', $task);
    }

    public function show(Task $task, TimeEntry $timeEntry)
    {
        return view('time_entries.show', compact('timeEntry', 'task'));
    }

    public function edit(Task $task, TimeEntry $timeEntry)
    {
        return view('time_entries.edit', compact('timeEntry', 'task'));
    }

    public function update(Request $request, Task $task, TimeEntry $timeEntry)
    {
        $request->validate([
            'start_time' => 'required|date',
            'end_time' => 'required|date',
            'duration' => 'required|integer',
        ]);

        $timeEntry->update($request->all());

        return redirect()->route('tasks.time_entries.index', $task);
    }

    public function destroy(Task $task, TimeEntry $timeEntry)
    {
        $timeEntry->delete();

        return redirect()->route('tasks.time_entries.index', $task);
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Task;
use App\Models\TimeEntry;
use Illuminate\Http\Request;

class TimeEntryController extends Controller
{
    public function index()
    {
        $timeEntries = TimeEntry::all();
        return view('time_entries.index', compact('timeEntries'));
    }

    public function create()
    {
        $tasks = Task::all();
        return view('time_entries.create', compact('tasks'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'task_id' => 'required|exists:tasks,id',
            'start_time' => 'required|date',
            'end_time' => 'required|date|after:start_time',
        ]);

        $duration = (strtotime($request->end_time) - strtotime($request->start_time)) / 60;

        $timeEntry = new TimeEntry([
            'task_id' => $request->task_id,
            'user_id' => auth()->id(),
            'start_time' => $request->start_time,
            'end_time' => $request->end_time,
            'duration' => $duration,
        ]);
        $timeEntry->save();

        return redirect()->route('time_entries.index');
    }

    public function show(TimeEntry $timeEntry)
    {
        return view('time_entries.show', compact('timeEntry'));
    }

    public function edit(TimeEntry $timeEntry)
    {
        $tasks = Task::all();
        return view('time_entries.edit', compact('timeEntry', 'tasks'));
    }

    public function update(Request $request, TimeEntry $timeEntry)
    {
        $request->validate([
            'task_id' => 'required|exists:tasks,id',
            'start_time' => 'required|date',
            'end_time' => 'required|date|after:start_time',
        ]);

        $duration = (strtotime($request->end_time) - strtotime($request->start_time)) / 60;

        $timeEntry->update([
            'task_id' => $request->task_id,
            'start_time' => $request->start_time,
            'end_time' => $request->end_time,
            'duration' => $duration,
        ]);

        return redirect()->route('time_entries.index');
    }

    public function destroy(TimeEntry $timeEntry)
    {
        $timeEntry->delete();

        return redirect()->route('time_entries.index');
    }
}

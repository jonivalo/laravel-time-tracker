<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Project;
use App\Models\Task;
use App\Models\TimeEntry;

class HomeController extends Controller
{
    public function index()
    {
        if (auth()->user()->usertype == 'admin') {
            return view('admin.dashboard');
        }

        $projects = Project::all();
        $tasks = Task::latest()->take(5)->get();
        $timeEntries = TimeEntry::latest()->take(5)->get();

        return view('dashboard', compact('projects', 'tasks', 'timeEntries'));
    }
}

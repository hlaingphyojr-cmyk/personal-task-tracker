<?php

namespace App\Http\Controllers;

use App\Models\Task;

class DashboardController extends Controller
{
    public function index()
    {
        $totalTasks = Task::count();

        $completedTasks = Task::where(
            'status',
            'completed'
        )->count();

        $pendingTasks = Task::where(
            'status',
            'pending'
        )->count();

        return view('dashboard', compact(
            'totalTasks',
            'completedTasks',
            'pendingTasks'
        ));
    }
}

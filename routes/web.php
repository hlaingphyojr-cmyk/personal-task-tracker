<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TaskController;

Route::get('/', function () {
     return redirect()->route('tasks.index');
});

Route::resource('tasks', TaskController::class)->except(['show']);


Route::get('/dashboard', function () {
    $totalTasks = \App\Models\Task::count();

    $completedTasks = \App\Models\Task::where(
        'status',
        'completed'
    )->count();

    $pendingTasks = \App\Models\Task::where(
        'status',
        'pending'
    )->count();

    return view('dashboard', compact(
        'totalTasks',
        'completedTasks',
        'pendingTasks'
    ));
})->name('dashboard');

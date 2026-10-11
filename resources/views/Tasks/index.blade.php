
@extends('layouts.app')

@section('title', 'My Tasks')

@section('content')

<h1 class="h3 mb-4 text-gray-800">My Tasks</h1>

@if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

@if ($errors->any())
    <div class="alert alert-danger">
        Please check the form for errors.
    </div>
@endif

<div class="card shadow mb-4">
    <div class="card-header py-3 d-flex justify-content-between align-items-center">
        <h6 class="m-0 font-weight-bold text-primary">
            Task List
        </h6>

        <a href="{{ route('tasks.create') }}"
           class="btn btn-primary btn-sm">
            <i class="fas fa-plus"></i> Add Task
        </a>
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Title</th>
                        <th>Description</th>
                        <th>Due Date</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                </thead>

                <tbody>
                    @forelse ($tasks as $task)
                        <tr>
                            <td>{{ $loop->iteration }}</td>

                            <td>{{ $task->title }}</td>

                            <td>
                                {{ $task->description ?: '-' }}
                            </td>

                            <td>
                                {{ $task->due_date?->format('Y-m-d') ?? '-' }}
                            </td>

                            <td>
                                @if ($task->status === 'completed')
                                    <span class="badge badge-success">
                                        Completed
                                    </span>
                                @else
                                    <span class="badge badge-warning">
                                        Pending
                                    </span>
                                @endif
                            </td>

                            <td>
                                <a href="{{ route('tasks.edit', $task) }}"
                                   class="btn btn-warning btn-sm">
                                    Edit
                                </a>

                                <form action="{{ route('tasks.destroy', $task) }}"
                                      method="POST"
                                      class="d-inline"
                                      onsubmit="return confirm('Delete this task?')">
                                    @csrf
                                    @method('DELETE')

                                    <button type="submit"
                                            class="btn btn-danger btn-sm">
                                        Delete
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="text-center">
                                No tasks found. Click Add Task to create one.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection

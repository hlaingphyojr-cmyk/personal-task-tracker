
@extends('layouts.app')

@section('title', 'Edit Task')

@section('content')

<h1 class="h3 mb-4 text-gray-800">Edit Task</h1>

<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">
            Update Task Information
        </h6>
    </div>

    <div class="card-body">

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul class="mb-0">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('tasks.update', $task) }}"
              method="POST">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label>Task Title</label>
                <input type="text"
                       name="title"
                       class="form-control"
                       value="{{ old('title', $task->title) }}"
                       required>
            </div>

            <div class="form-group">
                <label>Description</label>
                <textarea name="description"
                          class="form-control"
                          rows="4">{{ old('description', $task->description) }}</textarea>
            </div>

            <div class="form-group">
                <label>Due Date</label>
                <input type="date"
                       name="due_date"
                       class="form-control"
                       value="{{ old('due_date', $task->due_date?->format('Y-m-d')) }}">
            </div>

            <div class="form-group">
                <label for="status">Status</label>
                <select name="status" id="status" class="form-select" required>
                    <option value="pending"
                        @selected(old('status', $task->status) === 'pending')>
                        Pending
                    </option>
                    <option value="completed"
                        @selected(old('status', $task->status) === 'completed')>
                        Completed
                    </option>
                </select>
            </div>

            <button type="submit" class="btn btn-primary">
                Update Task
            </button>

            <a href="{{ route('tasks.index') }}"
               class="btn btn-secondary">
                Cancel
            </a>
        </form>

    </div>
</div>

@endsection

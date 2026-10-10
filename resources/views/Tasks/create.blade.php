
@extends('layouts.app')

@section('title', 'Add Task')

@section('content')

<h1 class="h3 mb-4 text-gray-800">Add New Task</h1>

<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">
            Task Information
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

        <form action="{{ route('tasks.store') }}" method="POST">
            @csrf

            <div class="form-group">
                <label>Task Title</label>
                <input type="text"
                       name="title"
                       class="form-control"
                       value="{{ old('title') }}"
                       required>
            </div>

            <div class="form-group">
                <label>Description</label>
                <textarea name="description"
                          class="form-control"
                          rows="4">{{ old('description') }}</textarea>
            </div>

            <div class="form-group">
                <label>Due Date</label>
                <input type="date"
                       name="due_date"
                       class="form-control"
                       value="{{ old('due_date') }}">
            </div>

            <div class="form-group">
                <label>Status</label>
                <select name="status" class="form-control" required>
                    <option value="Pending"
                        {{ old('status', 'pending') === 'pending' ? 'selected' : '' }}>
                        Pending
                    </option>
                    <option value="Completed"
                        {{ old('status') === 'completed' ? 'selected' : '' }}>
                        Completed
                    </option>
                </select>
            </div>

            <button type="submit" class="btn btn-primary">
                Save Task
            </button>

            <a href="{{ route('tasks.index') }}"
               class="btn btn-secondary">
                Cancel
            </a>
        </form>

    </div>
</div>

@endsection

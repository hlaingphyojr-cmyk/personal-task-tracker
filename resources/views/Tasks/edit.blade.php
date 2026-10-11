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

        {{-- Display all validation errors --}}
        @if ($errors->any())
            <div class="alert alert-danger alert-dismissible fade show"
                 role="alert">
                <strong>Please fix the following errors:</strong>

                <ul class="mb-0 mt-2">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>

                <button type="button"
                        class="close"
                        data-dismiss="alert"
                        aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif

        <form action="{{ route('tasks.update', $task) }}"
              method="POST"
              novalidate>
            @csrf
            @method('PUT')

            {{-- Task Title --}}
            <div class="form-group">
                <label for="title">
                    Task Title <span class="text-danger">*</span>
                </label>

                <input type="text"
                       id="title"
                       name="title"
                       class="form-control @error('title') is-invalid @enderror"
                       value="{{ old('title', $task->title) }}"
                       maxlength="255"
                       required
                       autofocus
                       aria-describedby="titleError">

                @error('title')
                    <div id="titleError" class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            {{-- Description --}}
            <div class="form-group">
                <label for="description">Description</label>

                <textarea id="description"
                          name="description"
                          class="form-control @error('description') is-invalid @enderror"
                          rows="4"
                          maxlength="2000"
                          aria-describedby="descriptionError">{{ old('description', $task->description) }}</textarea>

                <small class="form-text text-muted">
                    Maximum 2000 characters.
                </small>

                @error('description')
                    <div id="descriptionError" class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            {{-- Due Date --}}
            <div class="form-group">
                <label for="due_date">Due Date</label>

                <input type="date"
                       id="due_date"
                       name="due_date"
                       class="form-control @error('due_date') is-invalid @enderror"
                       value="{{ old('due_date', $task->due_date ? \Carbon\Carbon::parse($task->due_date)->format('Y-m-d') : '') }}"
                       aria-describedby="dueDateError">

                @error('due_date')
                    <div id="dueDateError" class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            {{-- Status --}}
            <div class="form-group">
                <label for="status">
                    Status <span class="text-danger">*</span>
                </label>

                <select id="status"
                        name="status"
                        class="form-control @error('status') is-invalid @enderror"
                        required
                        aria-describedby="statusError">

                    <option value="pending"
                        {{ old('status', $task->status) === 'pending' ? 'selected' : '' }}>
                        Pending
                    </option>

                    <option value="completed"
                        {{ old('status', $task->status) === 'completed' ? 'selected' : '' }}>
                        Completed
                    </option>
                </select>

                @error('status')
                    <div id="statusError" class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            {{-- Buttons --}}
            <button type="submit" class="btn btn-primary">
                <i class="fas fa-save"></i> Update Task
            </button>

            <a href="{{ route('tasks.index') }}"
               class="btn btn-secondary">
                <i class="fas fa-arrow-left"></i> Cancel
            </a>

        </form>

    </div>
</div>

@endsection

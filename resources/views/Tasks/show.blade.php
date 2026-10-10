
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Task Details</title>
</head>
<body>
    <h1>Task Details</h1>

    <h2>{{ $task->title }}</h2>

    <p>
        <strong>Description:</strong>
        {{ $task->description ?? 'No description' }}
    </p>

    <p>
        <strong>Due Date:</strong>
        {{ $task->due_date?->format('Y-m-d') ?? 'N/A' }}
    </p>

    <p>
        <strong>Status:</strong>
        {{ $task->status }}
    </p>

    <p>
        <a href="{{ route('tasks.edit', $task) }}">Edit Task</a>
    </p>

    <p>
        <a href="{{ route('tasks.index') }}">Back to Tasks</a>
    </p>
</body>
</html>
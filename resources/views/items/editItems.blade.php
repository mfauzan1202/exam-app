<!DOCTYPE html>
<html>

<head>
    <title>Edit Item</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container mt-5">
        <h1>Edit Item</h1>

        <form action="{{ route('items.update', $item['_id']) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label class="form-label">Title</label>
                <input type="text" name="title" class="form-control" value="{{ $item['title'] }}" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Description</label>
                <textarea name="description" class="form-control" required>{{ $item['description'] }}</textarea>
            </div>
            <div class="mb-3">
                <label class="form-label">Deadline</label>
                <input type="date" name="dueDate" class="form-control"
                    value="{{ \Carbon\Carbon::parse($item['dueDate'])->toDateString() }}" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Priority</label>
                <select name="priority" class="form-select" required>
                    <option value="Low" {{ $item['priority'] === 'Low' ? 'selected' : '' }}>Low</option>
                    <option value="Medium" {{ $item['priority'] === 'Medium' ? 'selected' : '' }}>Medium</option>
                    <option value="High" {{ $item['priority'] === 'High' ? 'selected' : '' }}>High</option>
                    <option value="Critical" {{ $item['priority'] === 'Critical' ? 'selected' : '' }}>Critical</option>
                </select>
            </div>
            <div class="mb-3">
                <label class="form-label">Status</label>
                <select name="status" class="form-select" required>
                    <option value="Not Started" {{ $item['status'] === 'Not Started' ? 'selected' : '' }}>Not Started
                    </option>
                    <option value="In Progress" {{ $item['status'] === 'In Progress' ? 'selected' : '' }}>In Progress
                    </option>
                    <option value="Completed" {{ $item['status'] === 'Completed' ? 'selected' : '' }}>Completed</option>
                </select>
            </div>
            <div class="mb-3">
                <label class="form-label">Tags</label>
                <input type="text" name="tags" class="form-control" value="{{ implode(',', $item['tags']) }}" required>
            </div>
            <button type=" submit" class="btn btn-primary">Update</button>
            <a href="{{ route('items.index') }}" class="btn btn-secondary">Cancel</a>
        </form>
    </div>
</body>

</html>
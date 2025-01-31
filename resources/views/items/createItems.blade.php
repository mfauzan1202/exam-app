<!DOCTYPE html>
<html>

<head>
    <title>Add Item</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container mt-5">
        <h1>Add Item</h1>

        <form action="{{ route('items.store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label class="form-label">Title</label>
                <input type="text" name="title" class="form-control" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Description</label>
                <textarea name="description" class="form-control" required></textarea>
            </div>
            <div class="mb-3">
                <label class="form-label">Deadline</label>
                <input type="date" name="dueDate" class="form-control" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Priority</label>
                <select name="priority" class="form-select" required>
                    <option value="Low">Low</option>
                    <option value="Medium">Medium</option>
                    <option value="High">High</option>
                    <option value="Critical">Critical</option>
                </select>
            </div>
            <div class="mb-3">
                <label class="form-label">Status</label>
                <select name="status" class="form-select" required>
                    <option value="Not Started">Not Started</option>
                    <option value="In Progress">In Progress</option>
                    <option value="Completed">Completed</option>
                </select>
            </div>
            <div class="mb-3">
                <label class="form-label">Tags</label>
                <input type="text" name="tags" class="form-control" required>
            </div>
            <button type=" submit" class="btn btn-primary">Update</button>
            <a href="{{ route('items.index') }}" class="btn btn-secondary">Cancel</a>
        </form>
    </div>
</body>

</html>
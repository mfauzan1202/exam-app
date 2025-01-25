<!DOCTYPE html>
<html>

<head>
    <title>Edit Item</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container mt-5">
        <h1>Edit Item</h1>

        <form action="{{ route('items.update', $item['id']) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label class="form-label">Title</label>
                <input type="text" name="title" class="form-control" value="{{ $item['title'] }}" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Price</label>
                <textarea name="price" class="form-control" required>{{ $item['price'] }}</textarea>
            </div>
            <div class="mb-3">
                <label class="form-label">Description</label>
                <textarea name="description" class="form-control" required>{{ $item['description'] }}</textarea>
            </div>
            <div class="mb-3">
                <label class="form-label">Category</label>
                <input type="text" name="category" class="form-control" value="{{ $item['category'] }}" required>
            </div>
            <div class="mb-3">
                <label class="form-label
                ">Image</label>
                <input type="text" name="image" class="form-control" value="{{ $item['image'] }}" required>
            </div>
            <div class="mb-3">
                <label class="form-label
                ">Rating</label>
                <input type="text" name="rating" class="form-control" value="{{ $item['rating']['rate'] }}" required>
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
            <a href="{{ route('items.index') }}" class="btn btn-secondary">Cancel</a>
        </form>
    </div>
</body>

</html>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css">
    <title>Manage Tags</title>
</head>
<body class="bg-light text-dark">
    <div class="container py-5">
        <h1 class="text-center mb-4">Manage Tags</h1>
        <form action="{{ route('tags.store') }}" method="POST" class="mb-4">
            @csrf
            <div class="input-group">
                <input type="text" name="name" class="form-control" placeholder="New Tag Name" required>
                <button type="submit" class="btn btn-success rounded-3">Add Tag</button>
            </div>
        </form>
        <h2 class="mb-3">Existing Tags</h2>
        <ul class="list-group">
            @foreach ($tags as $tag)
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    <form action="{{ route('tags.update', $tag->id) }}" method="POST" class="d-flex align-items-center me-3">
                        @csrf
                        @method('PUT')
                        <input type="text" name="name" value="{{ $tag->name }}" class="form-control me-2">
                        <button type="submit" class="btn btn-warning btn-sm rounded-3">Update</button>
                    </form>
                    @if ($tag->members->isEmpty())
                        <form action="{{ route('tags.destroy', $tag->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this tag?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm rounded-3">Delete</button>
                        </form>
                    @else
                        <span class="badge bg-secondary">In Use</span>
                    @endif
                </li>
            @endforeach
        </ul>
    </div>
</body>
</html>
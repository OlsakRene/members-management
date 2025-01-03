<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css">
    <title>Create Member</title>
</head>
<body class="bg-light text-dark">
    <div class="container py-5">
        <h1 class="text-center mb-4">Create New Member</h1>
        <form action="{{ route('members.store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="first_name" class="form-label">First Name</label>
                <input type="text" name="first_name" id="first_name" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="last_name" class="form-label">Last Name</label>
                <input type="text" name="last_name" id="last_name" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" name="email" id="email" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="birth_date" class="form-label">Birth Date</label>
                <input type="date" name="birth_date" id="birth_date" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="tags" class="form-label">Tags</label>
                <div id="tags-container">
                    @foreach ($tags as $tag)
                        <div class="form-check">
                            <input type="checkbox" class="form-check-input" name="tags[]" id="tag-{{ $tag->id }}" value="{{ $tag->id }}">
                            <label class="form-check-label" for="tag-{{ $tag->id }}">{{ $tag->name }}</label>
                        </div>
                    @endforeach
                </div>
            </div>
            <button type="submit" class="btn btn-primary rounded-3">Create Member</button>
        </form>
    </div>
</body>
</html>
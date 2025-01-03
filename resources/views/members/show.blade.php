<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css">
    <title>View Member</title>
</head>
<body class="bg-light text-dark">
    <div class="container py-5">
        <h1 class="text-center mb-4">Member Details</h1>
        <div class="mb-3">
            <strong>First Name:</strong> {{ $member->first_name }}
        </div>
        <div class="mb-3">
            <strong>Last Name:</strong> {{ $member->last_name }}
        </div>
        <div class="mb-3">
            <strong>Email:</strong> {{ $member->email }}
        </div>
        <div class="mb-3">
            <strong>Birth Date:</strong> {{ $member->birth_date }}
        </div>
        <div class="mb-3">
            <strong>Tags:</strong>
            <ul>
                @foreach ($member->tags as $tag)
                    <li>{{ $tag->name }}</li>
                @endforeach
            </ul>
        </div>
        <a href="{{ route('members.index') }}" class="btn btn-secondary rounded-3">Back to Members</a>
    </div>
</body>
</html>
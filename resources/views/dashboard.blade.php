<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css">
    <title>Home</title>
</head>
<body class="bg-light text-dark">
    <div class="container py-5">
        <h1 class="text-center mb-4">HOME</h1>
        <div class="text-center">
            <a href="{{ route('members.index') }}" class="btn btn-primary rounded-3 mb-2">Manage Members</a>
        </div>
        <div class="text-center">
            <a href="{{ route('tags.index') }}" class="btn btn-primary rounded-3">Manage Tags</a>
        </div>
    </div>
</body>
</html>
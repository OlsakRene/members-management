<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css">
    <title>Members</title>
    <style>
        .card {
            border: none;
            border-radius: 10px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }
    </style>
</head>
<body class="bg-light text-dark">
    <div class="container py-5">
        <div class="card">
            <div class="card-header bg-light text-center fw-bold">
                <h1 class="mb-0">Members</h1>
            </div>
            <div class="card-body">
                <div class="d-flex justify-content-between mb-3">
                    <h4 class="text-secondary">Member List</h4>
                    <a href="{{ route('members.create') }}" class="btn btn-success rounded-3">+ Add New Member</a>
                </div>
                <div class="table-responsive">
                    <table class="table table-hover align-middle">
                        <thead class="bg-light">
                            <tr>
                                <th>ID</th>
                                <th>First Name</th>
                                <th>Last Name</th>
                                <th>Email</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($members as $member)
                                <tr>
                                    <td>{{ $member->id }}</td>
                                    <td>{{ $member->first_name }}</td>
                                    <td>{{ $member->last_name }}</td>
                                    <td>{{ $member->email }}</td>
                                    <td>
                                        <div class="d-flex">
                                            <a href="{{ route('members.show', $member->id) }}" class="btn btn-info btn-sm me-2 rounded-3">View</a>
                                            <a href="{{ route('members.edit', $member->id) }}" class="btn btn-warning btn-sm me-2 rounded-3">Edit</a>
                                            <form action="{{ route('members.destroy', $member->id) }}" method="POST" style="display:inline;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm rounded-3">Delete</button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</body>
</html>

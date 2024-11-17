<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <title>Customer Lists</title>
    <style>
        :root {
            --background-color-light: #f8f9fa;
            --background-color-dark: #121212;
            --sidebar-bg-light: #080808;
            --sidebar-bg-dark: #2c2c2c;
            --primary-color-light: #007bff;
            --primary-color-dark: #4d91ff;
            --text-light: #ffffff;
            --text-dark: #000000;
            --table-bg-light: #ffffff;
            --table-bg-dark: #333333;
        }

        body {
            min-height: 100vh;
            margin: 0;
            display: flex;
            background-color: var(--background-color-light);
            color: var(--text-dark);
            transition: background-color 0.3s, color 0.3s;
        }

        /* Sidebar Styles */
        .sidebar {
            width: 250px;
            background-color: var(--sidebar-bg-light);
            color: var(--text-light);
            height: 100vh;
            position: fixed;
            top: 0;
            left: 0;
            padding-top: 30px;
            transition: background-color 0.3s;
        }

        .sidebar a {
            color: var(--text-light);
            text-decoration: none;
            font-size: 18px;
            padding: 10px 15px;
            display: block;
        }

        .sidebar a:hover {
            background-color: #575757;
        }

        /* Main Content Styles */
        .container-fluid {
            margin-left: 270px;
            padding: 20px;
            background-color: var(--table-bg-light);
            transition: background-color 0.3s;
        }

        table {
            background-color: var(--table-bg-light);
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            width: 100%;
            transition: background-color 0.3s;
        }

        h4 {
            text-align: center;
            margin-bottom: 20px;
        }

        /* Button to toggle theme */
        .theme-toggle-btn {
            position: absolute;
            top: 20px;
            right: 20px;
            padding: 10px;
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        .theme-toggle-btn:hover {
            background-color: #0056b3;
        }

        /* Dark mode styles */
        body.dark-mode {
            background-color: var(--background-color-dark);
            color: var(--text-light);
        }

        .sidebar.dark-mode {
            background-color: var(--sidebar-bg-dark);
        }

        .container-fluid.dark-mode {
            background-color: var(--table-bg-dark);
        }

        table.dark-mode {
            background-color: var(--table-bg-dark);
        }
    </style>
</head>

<body>
    <!-- Sidebar Navigation -->
    <div class="sidebar">
        <h3 class="text-center text-white">Dashboard</h3>
        <a href="{{ route('listOfUser') }}">User List</a>
        <a href="{{ route('logOut') }}">Logout</a>
    </div>

    <!-- Main Content -->
    <div class="container-fluid">
        <h4 class="text-primary">{{$welcome}}</h4>
        <h4 class="text-secondary">{{$title}}</h4>
        <hr>
        <a href="{{ route('sabbir.create') }}" class="btn btn-sm btn-success mb-3">Add User</a>
        @if($users->count() > 0)
        <div class="table-responsive">
            <table class="table table-striped table-hover">
                <thead class="table-dark">
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Date Of Birth</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Gender</th>
                        <th>Bio</th>
                        <th>Created At</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($users as $user)
                    <tr>
                        <td>{{ $user->id }}</td>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->dob }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->phone }}</td>
                        <td>{{ $user->gender }}</td>
                        <td>{{ $user->bio }}</td>
                        <td>{{ $user->created_at->format('d M Y') }}</td>
                        <td>
                            <!-- Edit Button -->
                            <a href="{{ route('sabbir.edit', $user->id) }}" class="btn btn-sm btn-primary">
                                Edit
                            </a>
                            <!-- Delete Button -->
                            <form action="{{ route('sabbir.destroy', $user->id) }}" method="POST" style="display:inline-block;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger"
                                    onclick="return confirm('Are you sure you want to delete this user?')">
                                    Delete
                                </button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        @else
        <div class="alert alert-warning text-center">
            No users found.
        </div>
        @endif
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>

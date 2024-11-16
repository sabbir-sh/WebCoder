<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <title>Custom Authentication</title>
    <style>
        body {
            min-height: 100vh;
            display: flex;
            margin: 0;
            background-color: #f8f9fa;
        }

        .sidebar {
            width: 250px;
            background-color: #080808;
            color: white;
            height: 100vh;
            position: fixed;
            top: 0;
            left: 0;
            padding-top: 30px;
        }

        .sidebar a {
            color: white;
            text-decoration: none;
            font-size: 18px;
            padding: 10px 15px;
            display: block;
        }

        .sidebar a:hover {
            background-color: #575757;
        }

        .container {
            margin-left: 270px;
            width: 100%;
            max-width: 900px;
            background-color: white;
            box-shadow: 0 2px 5px rgba(243, 240, 240, 0.1);
            border-radius: 8px;
            padding: 20px;
            margin-top: 20px;
        }

        h4 {
            text-align: center;
            margin-bottom: 20px;
        }

        table {
            margin-top: 20px;
        }

        /* Center the table within the container */
        table {
            width: 100%;
            text-align: left;
        }

        td, th {
            vertical-align: middle;
        }

        .navbar {
            display: none;
        }
    </style>
</head>

<body>
    <!-- Sidebar Navigation -->
    <div class="sidebar">
        <h3 class="text-center text-white">Dashboard</h3>
        

        <!-- User Main Menu -->
        <a href="#userSubMenu" data-bs-toggle="collapse" class="dropdown-toggle">User</a>
        <div class="collapse" id="userSubMenu">
            <a href="{{ route('listOfUser') }}" class="ps-4">User List</a>
        </div>

        <!-- Logout -->
        <a href="{{ route('logOut') }}">Logout</a>
    </div>

    <!-- Main Content Container -->
    <div class="container">
        <h4>Welcome to Dashboard</h4>
        <hr>
        <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>{{ $data->name }}</td>
                    <td>{{ $data->email }}</td>
                    <td>{{ $data->phone }}</td>
                    <td><a href="{{ route('logOut') }}" class="btn btn-danger btn-sm">Logout</a></td>
                </tr>
            </tbody>
        </table>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>

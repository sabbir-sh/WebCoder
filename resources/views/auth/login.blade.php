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
            background-color: #343a40;
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
            background-color: #000000;
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

        .navbar {
            display: none;
        }
    </style>
</head>

<body>
    <!-- Sidebar Navigation -->
    <div class="sidebar">
        <h3 class="text-center text-white">Dashboard</h3>
        <a href="{{ route('login') }}">Login</a>
        <a href="{{ route('listOfUser') }}">User List</a>
        <a href="{{ route('logOut') }}">Logout</a>
    </div>

    <!-- Main Content Container -->
    <div class="container">
        <h4>Login Page</h4>
        <hr>

        <form action="{{ route('login-user') }}" method="POST">
            @if(Session::has('success'))
                <div class="alert alert-success">{{ Session::get('success') }}</div>
            @endif

            @if(Session::has('fail'))
                <div class="alert alert-danger">{{ Session::get('fail') }}</div>
            @endif
            @csrf
            <div class="form-group">
                <label for="email">Email</label>
                <input type="text" class="form-control" placeholder="Enter Email" name="email" value="{{ old('email') }}">
                <span class="text-danger">@error('email') {{$message}}@enderror</span>
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" class="form-control" placeholder="Enter Password" name="password" required>
                <span class="text-danger">@error('password') {{$message}}@enderror</span>
            </div>

            <div class="form-group">
                <button class="btn btn-block btn-primary" type="submit">
                    Login
                </button>
            </div>
            <br>
            <a href="{{ route('register') }}" class="btn btn-block btn-secondary"> New User !! Register Here </a>

            <br><br>

            <!-- Show All Users Button -->
            <div class="form-group">
                <a href="{{ route('listOfUser') }}" class="btn btn-block btn-secondary">
                    Show All Users
                </a>
            </div>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>

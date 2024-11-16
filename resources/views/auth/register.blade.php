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
        <a href="{{ route('register') }}">Register</a>
        <a href="{{ route('listOfUser') }}">User List</a>
        <a href="{{ route('logOut') }}">Logout</a>
    </div>

    <!-- Main Content Container -->
    <div class="container">
        <h4>Registration Page</h4>
        <hr>
        <form action="{{ route('register-user') }}" method="POST">
            @if(Session::has('success'))
                <div class="alert alert-success">{{ Session::get('success') }}</div>
            @endif

            @if(Session::has('fail'))
                <div class="alert alert-danger">{{ Session::get('fail') }}</div>
            @endif

            @csrf
            <div class="form-group">
                <label for="name">Full Name</label>
                <input type="text" id="name" class="form-control" placeholder="Enter Full Name" name="name" value="{{ old('name') }}">
                <span class="text-danger">@error('name') {{$message}}@enderror</span>
            </div>

            <div class="form-group">
                <label for="dob">Date of Birth</label>
                <input
                    type="date"
                    id="dob"
                    class="form-control"
                    name="dob"
                    value="{{ old('dob', isset($user) ? $user->dob : '') }}">
                <span class="text-danger">@error('dob') {{ $message }} @enderror</span>
            </div>

            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" id="email" class="form-control" placeholder="Enter Email" name="email" value="{{ old('email') }}">
                <span class="text-danger">@error('email') {{$message}}@enderror</span>
            </div>

                        <!-- Gender -->
            <!-- Gender -->
<div class="form-group">
    <label for="gender">Gender</label>
    <div>
        <label class="me-3">
            <input type="radio" name="gender" value="male"
                {{ old('gender', isset($user) ? $user->gender : '') == 'male' ? 'checked' : '' }}> Male
        </label>
        <label class="me-3">
            <input type="radio" name="gender" value="female"
                {{ old('gender', isset($user) ? $user->gender : '') == 'female' ? 'checked' : '' }}> Female
        </label>
        <label>
            <input type="radio" name="gender" value="other"
                {{ old('gender', isset($user) ? $user->gender : '') == 'other' ? 'checked' : '' }}> Other
        </label>
    </div>
    <span class="text-danger">@error('gender') {{ $message }} @enderror</span>
</div>

<!-- Bio -->
<div class="form-group">
    <label for="bio">Bio</label>
    <textarea id="bio" class="form-control" placeholder="Write about yourself" name="bio" rows="4">{{ old('bio', isset($user) ? $user->bio : '') }}</textarea>
    <span class="text-danger">@error('bio') {{ $message }} @enderror</span>
</div>


            <div class="form-group">
                <label for="number">Phone Number</label>
                <input type="number" id="number" class="form-control" placeholder="Enter Number" name="number" value="{{ old('number') }}">
                <span class="text-danger">@error('number') {{$message}}@enderror</span>
            </div>

            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" id="password" class="form-control" placeholder="Enter Password" name="password" required>
                <span class="text-danger">@error('password') {{$message}}@enderror</span>
            </div>

            <div class="form-group">
                <button class="btn btn-block btn-primary" type="submit">
                    Register
                </button>
            </div>
            <br>
            <a href="{{ route('login') }}" class="btn btn-block btn-secondary">Already Registered? Login Here</a>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>

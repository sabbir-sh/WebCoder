<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <title>Custom Authentication</title>
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-md-4 col-md-offset-4" style="margin-top: 20px;">
                <h4>Registration Page</h4>
                <hr>
                <form action="{{route('register-user')}}" method="POST">

                    @if(Session::has('success'))
                    <div class="alert alert-success">{{Session::get('success')}}</div>
                    @endif

                    @if(Session::has('fail'))
                    <div class="alert alert-danger">{{Session::get('fail')}}</div>
                    @endif
                    @csrf
                    <div class="form-group">
                        <label for="name">Full Name</label>
                        <input type="text" id="name" class="form-control" placeholder="Enter Full Name" name="name"
                            value="{{old('name')}}">
                            <span class="text-danger">@error('name') {{$message}}@enderror</span>
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email"id="email" class="form-control" placeholder="Enter Email" name="email"
                            value="{{old('email')}}">
                            <span class="text-danger">@error('email') {{$message}}@enderror</span>
                    </div>
                    <div class="form-group">
                        <label for="number">Phone Number</label>
                        <input type="number"id="Number" class="form-control" placeholder="Enter Number" name="number"
                            value="{{old('number')}}">
                            <span class="text-danger">@error('number') {{$message}}@enderror</span>
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password"id="password" class="form-control" placeholder="Enter Password" name="password" required>
                        <span class="text-danger">@error('password') {{$message}}@enderror</span>
                    </div>
                    <div class="form-group">
                        <button class="btn btn-block btn-primary" type="submit">
                            Register
                        </button>
                    </div>
                    <br>
                    <a href="login"> Already Register !! Login Here </a>

                </form>
            </div>
</body>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js">

</html>

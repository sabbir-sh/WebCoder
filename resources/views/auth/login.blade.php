@extends('layout')

@section('content')
    <!-- Main Content Container -->
    <div class="container">
        <h4 style="text-align: center">Login Page</h4>
        <hr>

        <form action="{{ route('login-user') }}" method="POST" class="p-3 col-6 bg-light rounded shadow">
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
            <br>
            <div class="form-group">
                <button class="btn btn-block btn-primary" type="submit">
                    Login
                </button>
            </div>

                         <!-- Forgot Password -->
                         <div class="form-group text-left">
                            <a href="{{ route('forgot-password') }}" class="text-primary">Forgot Password?</a>
                        </div>
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

    @endsection

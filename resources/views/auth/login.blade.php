@extends('backend.layout')

@section('content')
    <!-- Main Content Container -->
    <div class="container d-flex justify-content-center align-items-center vh-100">
        <div class="col-md-4">
            <h4 class="text-center mb-4">Login Page</h4>
            <hr>
            <form action="{{ route('login-user') }}" method="POST" class="p-4 bg-light rounded shadow">
                @if(Session::has('success'))
                    <div class="alert alert-success">{{ Session::get('success') }}</div>
                @endif

                @if(Session::has('fail'))
                    <div class="alert alert-danger">{{ Session::get('fail') }}</div>
                @endif

                @csrf
                <!-- Email Input -->
                <div class="form-group mb-3">
                    <label for="email">Email</label>
                    <input type="text" class="form-control" placeholder="Enter Email" name="email" value="{{ old('email') }}">
                    <span class="text-danger">@error('email') {{$message}}@enderror</span>
                </div>

                <!-- Password Input -->
                <div class="form-group mb-3">
                    <label for="password">Password</label>
                    <input type="password" class="form-control" placeholder="Enter Password" name="password" required>
                    <span class="text-danger">@error('password') {{$message}}@enderror</span>
                </div>

                <!-- Login Button -->
                <div class="form-group mb-3">
                    <button class="btn btn-primary w-100" type="submit">Login</button>
                </div>

                <!-- Forgot Password Link -->
                <div class="form-group mb-3 text-center">
                    <a href="{{ route('forgot-password') }}" class="text-primary">Forgot Password?</a>
                </div>

                <!-- Register Button -->
                <div class="form-group">
                    <a href="{{ route('register') }}" class="btn btn-secondary w-100">New User? Register Here</a>
                </div>
            </form>
        </div>
    </div>



    @endsection

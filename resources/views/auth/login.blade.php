@extends('frontend.layout.app')

@section('custom-style')
<style>

</style>
@endsection
@section('main-content')

<div class="container d-flex justify-content-center align-items-center vh-100">
    <div class="col-md-6 col-lg-5">
        <h4 class="text-center mb-4"><strong>LOGIN PAGE</strong></h4>
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
                <label for="email"><b>Email</b></label>
                <input type="text" class="form-control" placeholder="Enter Email" name="email" value="{{ old('email') }}">
                <span class="text-danger">@error('email') {{$message}}@enderror</span>
            </div>

            <!-- Password Input -->
            <div class="form-group mb-3">
                <label for="password"><b>Password</b></label>
                <input type="password" class="form-control" placeholder="Enter Password" name="password" required>
                <span class="text-danger">@error('password') {{$message}}@enderror</span>
            </div>

            <!-- Login Button -->
            <div class="form-group mb-3">
                <button class="btn btn-primary" type="submit"><b>Login</b></button>
            </div>

            <!-- Forgot Password Link -->
            <div class="form-group mb-3">
                <a href="{{ route('forgot-password') }}" class="text-primary"><b>Forgot Password?</b></a>
            </div>

            <!-- Register Button -->
            <div class="form-group">
                <a href="{{ route('register') }}" class="btn btn-secondary">New User? Register Here</a>
            </div>
        </form>
    </div>
</div>

@endsection
@section('custom-script')
<script>

</script>
@endsection







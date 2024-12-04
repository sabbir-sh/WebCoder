@extends('backend.layout')

@section('content')
<div class="container">
    <h4 style="text-align: center">Forgot Password</h4>
    <hr>
    <form action="{{ route('handle-forgot-password') }}" method="POST" class="p-3 col-6 bg-light rounded shadow">
        @if(Session::has('success'))
            <div class="alert alert-success">{{ Session::get('success') }}</div>
        @endif

        @if(Session::has('fail'))
            <div class="alert alert-danger">{{ Session::get('fail') }}</div>
        @endif
        @csrf
        <div class="form-group">
            <label for="email">Enter Your Email</label>
            <input type="email" class="form-control" placeholder="Enter Email" name="email" required>
            <span class="text-danger">@error('email') {{$message}}@enderror</span>
        </div>
        <br>
        <div class="form-group">
            <button class="btn btn-block btn-primary" type="submit">
                Send Password Reset Link
            </button>
        </div>
    </form>
</div>
@endsection

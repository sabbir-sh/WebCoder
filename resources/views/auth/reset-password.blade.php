@extends('backend.layout')

@section('content')
<div class="container">
    <h4 style="text-align: center">Reset Password</h4>
    <hr>
    <form action="{{ route('handle-reset-password') }}" method="POST" class="p-3 col-6 bg-light rounded shadow">
        @if(Session::has('fail'))
            <div class="alert alert-danger">{{ Session::get('fail') }}</div>
        @endif
        @csrf
        <input type="hidden" name="token" value="{{ $token }}">
        <input type="hidden" name="email" value="{{ $email }}">

        <div class="form-group">
            <label for="password">New Password</label>
            <input type="password" class="form-control" placeholder="Enter New Password" name="password" required>
            <span class="text-danger">@error('password') {{$message}}@enderror</span>
        </div>
        <div class="form-group">
            <label for="password_confirmation">Confirm New Password</label>
            <input type="password" class="form-control" placeholder="Confirm Password" name="password_confirmation" required>
            <span class="text-danger">@error('password_confirmation') {{$message}}@enderror</span>
        </div>
        <br>
        <div class="form-group">
            <button class="btn btn-block btn-primary" type="submit">
                Reset Password
            </button>
        </div>
    </form>
</div>
@endsection

@extends('frontend.layout.app')

@section('custom-style')
<style>

</style>
@endsection
@section('main-content')

<div class="container d-flex justify-content-center align-items-center vh-100">
    <div class="col-md-4">
        <h4 class="text-center mb-4">Reset Password</h4>
        <hr>
    <form action="{{ route('handle-forgot-password') }}" method="POST" class="p-3 bg-light rounded shadow">
        @if(Session::has('success'))
            <div class="alert alert-success">{{ Session::get('success') }}</div>
        @endif

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
</div>

@endsection
@section('custom-script')
<script>

</script>
@endsection


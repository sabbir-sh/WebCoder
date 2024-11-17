
@extends('layout')

@section('content')
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

    @endsection

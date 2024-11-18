<!-- resources/views/users/create.blade.php -->

@extends('layout')
@section('content')
<div class="container">
    <h2>Create New User</h2>
    <form action="{{ route('user.store') }}" method="POST">
        <!-- Success Message -->
        @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
        @endif

        <!-- Validation Errors -->
        @if($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif

        @csrf
        <div class="form-group">
            <label for="name">Full Name</label>
            <input type="text" id="name" class="form-control" placeholder="Enter Full Name" name="name" value="">
            <span class="text-danger">@error('name') {{$message}}@enderror</span>
        </div>

        <div class="form-group">
            <label for="dob">Date of Birth</label>
            <input
                type="date" id="dob" class="form-control" name="dob"
                value="">
            <span class="text-danger">@error('dob') {{ $message }} @enderror</span>
        </div>

        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" id="email" class="form-control" placeholder="Enter Email" name="email" value="">
            <span class="text-danger">@error('email') {{$message}}@enderror</span>
        </div>


        <!-- Gender -->
        <div class="form-group">
            <label for="gender">Gender</label>
            <div>
                <label class="me-3">
                    <input type="radio" name="gender" value="male"> Male
                </label>
                <label class="me-3">
                    <input type="radio" name="gender" value="female"> Female
                </label>
                <label>
                    <input type="radio" name="gender" value="other"> Other
                </label>
            </div>
            <span class="text-danger">@error('gender') {{ $message }} @enderror</span>
        </div>

        <!-- Bio -->
        <div class="form-group">
            <label for="bio">Bio</label>
            <textarea id="bio" class="form-control" placeholder="Write about yourself" name="bio" rows="4"></textarea>
            <span class="text-danger">@error('bio') {{ $message }} @enderror</span>
        </div>


        <div class="form-group">
            <label for="number">Phone Number</label>
            <input type="number" id="number" class="form-control" placeholder="Enter Number" name="number" value="">
            <span class="text-danger">@error('number') {{$message}}@enderror</span>
        </div>

        <div class="form-group">
            <label for="password">Password</label>
            <input type="password" id="password" class="form-control" placeholder="Enter Password" name="password" required>
            <span class="text-danger">@error('password') {{$message}}@enderror</span>
        </div>
        <button type="submit" class="btn btn-success">Create User</button>

    </form>
</div>

@endsection


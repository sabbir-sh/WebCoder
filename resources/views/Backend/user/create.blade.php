@extends('Backend.layout.app')

@section('custom-style')
<style>

</style>
@endsection
@section('main-content')
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <h2 class="text-center mb-4"><strong>Create New User</strong></h2>
            <form action="{{ route('user.store') }}" method="POST" class="p-4 border rounded shadow-sm bg-light">
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

                <!-- Full Name -->
                <div class="mb-3">
                    <label for="name" class="form-label"><b>Full Name</b></label>
                    <input type="text" id="name" class="form-control" placeholder="Enter Full Name" name="name" value="">
                    <span class="text-danger">@error('name') {{$message}}@enderror</span>
                </div>

                <!-- Date of Birth -->
                <div class="mb-3">
                    <label for="dob" class="form-label"><b>Date of Birth</b></label>
                    <input type="date" id="dob" class="form-control" name="dob" value="">
                    <span class="text-danger">@error('dob') {{ $message }} @enderror</span>
                </div>

                <!-- Email -->
                <div class="mb-3">
                    <label for="email" class="form-label"><b>Email</b></label>
                    <input type="email" id="email" class="form-control" placeholder="Enter Email" name="email" value="">
                    <span class="text-danger">@error('email') {{$message}}@enderror</span>
                </div>

                <!-- Gender -->
                <div class="mb-3">
                    <label for="gender" class="form-label"><b>Gender</b></label>
                    <div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="gender" id="male" value="male">
                            <label class="form-check-label" for="male">Male</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="gender" id="female" value="female">
                            <label class="form-check-label" for="female">Female</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="gender" id="other" value="other">
                            <label class="form-check-label" for="other">Other</label>
                        </div>
                    </div>
                    <span class="text-danger">@error('gender') {{ $message }} @enderror</span>
                </div>

                <!-- Bio -->
                <div class="mb-3">
                    <label for="bio" class="form-label"><b>About Bio</b></label>
                    <textarea id="bio" class="form-control" placeholder="Write about yourself" name="bio" rows="2"></textarea>
                    <span class="text-danger">@error('bio') {{ $message }} @enderror</span>
                </div>

                <!-- Phone Number -->
                <div class="mb-3">
                    <label for="number" class="form-label"><b>Phone Number</b></label>
                    <input type="number" id="number" class="form-control" placeholder="Enter Number" name="number" value="">
                    <span class="text-danger">@error('number') {{$message}}@enderror</span>
                </div>

                <!-- Password -->
                <div class="mb-3">
                    <label for="password" class="form-label"><b>Password</b></label>
                    <input type="password" id="password" class="form-control" placeholder="Enter Password" name="password" required>
                    <span class="text-danger">@error('password') {{$message}}@enderror</span>
                </div>

                <button type="submit" class="btn btn-success w-100">Create User</button>
            </form>
        </div>
    </div>
</div>


@endsection


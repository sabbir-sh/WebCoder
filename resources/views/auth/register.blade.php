
@extends('backend.layout')

@section('content')
    <!-- Main Content Container -->
    <div class="container d-flex justify-content-center align-items-center" style="min-height: 100vh;">
        <div class="col-md-6 col-lg-5">
            <h4 class="text-center mb-4">Registration Page</h4>
            <form action="{{ route('register-user') }}" method="POST" class="p-4 bg-light rounded shadow-sm">
                @if(Session::has('success'))
                    <div class="alert alert-success">{{ Session::get('success') }}</div>
                @endif

                @if(Session::has('fail'))
                    <div class="alert alert-danger">{{ Session::get('fail') }}</div>
                @endif

                @csrf
                <!-- Full Name -->
                <div class="form-group mb-3">
                    <label for="name">Full Name</label>
                    <input type="text" id="name" class="form-control" placeholder="Enter Full Name" name="name" value="">
                    <span class="text-danger">@error('name') {{$message}}@enderror</span>
                </div>

                <!-- Date of Birth -->
                <div class="form-group mb-3">
                    <label for="dob">Date of Birth</label>
                    <input type="date" id="dob" class="form-control" name="dob" value="">
                    <span class="text-danger">@error('dob') {{ $message }} @enderror</span>
                </div>

                <!-- Email -->
                <div class="form-group mb-3">
                    <label for="email">Email</label>
                    <input type="email" id="email" class="form-control" placeholder="Enter Email" name="email" value="">
                    <span class="text-danger">@error('email') {{$message}}@enderror</span>
                </div>

                <!-- Gender -->
                <div class="form-group mb-3">
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
                <div class="form-group mb-3">
                    <label for="bio">Bio</label>
                    <textarea id="bio" class="form-control" placeholder="Write about yourself" name="bio" rows="4"></textarea>
                    <span class="text-danger">@error('bio') {{ $message }} @enderror</span>
                </div>

                <!-- Phone Number -->
                <div class="form-group mb-3">
                    <label for="number">Phone Number</label>
                    <input type="number" id="number" class="form-control" placeholder="Enter Number" name="number" value="">
                    <span class="text-danger">@error('number') {{$message}}@enderror</span>
                </div>

                <!-- Password -->
                <div class="form-group mb-3">
                    <label for="password">Password</label>
                    <input type="password" id="password" class="form-control" placeholder="Enter Password" name="password" required>
                    <span class="text-danger">@error('password') {{$message}}@enderror</span>
                </div>

                <!-- Register Button -->
                <div class="form-group mb-3">
                    <button class="btn btn-primary w-100" type="submit">
                        Register
                    </button>
                </div>

                <!-- Login Link -->
                <div class="text-center">
                    <a href="{{ route('login') }}" class="btn btn-secondary w-100">Already Registered? Login Here</a>
                </div>
            </form>
        </div>
    </div>



    @endsection

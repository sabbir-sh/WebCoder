@extends('frontend.layout.app')

@section('custom-style')
<style>
    body {
        background-color: #f8f9fa; /* Light background for a clean look */
    }

    .form-container {
        max-width: 800px;
        margin: auto;
    }

    @media (max-width: 576px) {
        .form-container {
            padding: 20px;
        }

        .form-group label {
            font-size: 14px; /* Smaller labels for mobile devices */
        }
    }
</style>
@endsection

@section('main-content')
<div class="container d-flex justify-content-center align-items-center" style="min-height: 100vh;">
    <div class="form-container bg-white p-4 rounded shadow-sm">
        <h4 class="text-center mb-4"><strong>REGISTRATION PAGE</strong></h4>
        <form action="{{ route('register-user') }}" method="POST">
            @if(Session::has('success'))
                <div class="alert alert-success">{{ Session::get('success') }}</div>
            @endif

            @if(Session::has('fail'))
                <div class="alert alert-danger">{{ Session::get('fail') }}</div>
            @endif

            @csrf
            <div class="row">
                <!-- Full Name -->
                <div class="col-md-6">
                    <div class="form-group mb-3">
                        <label for="name"><b>Full Name</b></label>
                        <input type="text" id="name" class="form-control" placeholder="Enter Full Name" name="name" value="">
                        <span class="text-danger">@error('name') {{ $message }} @enderror</span>
                    </div>
                </div>

                <!-- Email -->
                <div class="col-md-6">
                    <div class="form-group mb-3">
                        <label for="email"><b>Email</b></label>
                        <input type="email" id="email" class="form-control" placeholder="Enter Email" name="email" value="">
                        <span class="text-danger">@error('email') {{ $message }} @enderror</span>
                    </div>
                </div>
            </div>

            <div class="row">
                <!-- Phone Number -->
                <div class="col-md-6">
                    <div class="form-group mb-3">
                        <label for="number"><b>Phone Number</b></label>
                        <input type="number" id="number" class="form-control" placeholder="Enter Number" name="number" value="">
                        <span class="text-danger">@error('number') {{ $message }} @enderror</span>
                    </div>
                </div>

                <!-- Date of Birth -->
                <div class="col-md-6">
                    <div class="form-group mb-3">
                        <label for="dob"><b>Date of Birth</b></label>
                        <input type="date" id="dob" class="form-control" name="dob" value="">
                        <span class="text-danger">@error('dob') {{ $message }} @enderror</span>
                    </div>
                </div>
            </div>

            <div class="row">
                <!-- Password -->
                <div class="col-md-6">
                    <div class="form-group mb-3">
                        <label for="password"><b>Password</b></label>
                        <input type="password" id="password" class="form-control" placeholder="Enter Password" name="password" required>
                        <span class="text-danger">@error('password') {{ $message }} @enderror</span>
                    </div>
                </div>

                <!-- Gender -->
                <div class="col-md-6">
                    <div class="form-group mb-3">
                        <label for="gender"><b>Gender</b></label>
                        <div class="d-flex flex-wrap">
                            <div class="form-check me-3">
                                <input type="radio" class="form-check-input" name="gender" value="male" id="genderMale">
                                <label for="genderMale" class="form-check-label">Male</label>
                            </div>
                            <div class="form-check me-3">
                                <input type="radio" class="form-check-input" name="gender" value="female" id="genderFemale">
                                <label for="genderFemale" class="form-check-label">Female</label>
                            </div>
                            <div class="form-check">
                                <input type="radio" class="form-check-input" name="gender" value="other" id="genderOther">
                                <label for="genderOther" class="form-check-label">Other</label>
                            </div>
                        </div>
                        <span class="text-danger">@error('gender') {{ $message }} @enderror</span>
                    </div>
                </div>
            </div>

            <!-- Bio -->
            <div class="form-group mb-3">
                <label for="bio"><b>About Bio</b></label>
                <textarea id="bio" class="form-control" placeholder="Write about yourself" name="bio" rows="3"></textarea>
                <span class="text-danger">@error('bio') {{ $message }} @enderror</span>
            </div>

            <!-- Register Button -->
            <div class="form-group mb-3">
                <button class="btn btn-primary btn-block" type="submit">
                    Register
                </button>
            </div>
            <!-- Login Link -->
            <div class="form-group mb-3">
                <a href="{{ route('login') }}" class="btn btn-secondary">Already Registered? Login Here</a>
            </div>
        </form>
    </div>
</div>
@endsection

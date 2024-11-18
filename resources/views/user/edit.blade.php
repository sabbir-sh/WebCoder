@extends('layout')
@section('content')
    <!-- Main Content -->
    <div class="main-content">
        <h4 class="text-primary">Edit User</h4>
        <hr>
        <form action="{{ route('sabbir.update', $user->id) }}" method="POST" class="p-4 bg-light rounded shadow">
            @csrf
            @method('PUT') <!-- Use PUT for updating the resource -->

            <!-- Name Field -->
            <div class="mb-3">
                <label for="name" class="form-label">Name:</label>
                <input type="text" name="name" id="name" value="{{ old('name', $user->name) }}" class="form-control">
                @error('name')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

             <!-- DOB Field -->
            <div class="form-group">
                <label for="dob">Date of Birth</label>
                <input
                    type="date" id="dob" class="form-control" name="dob"
                    value="{{ old('dob', $user->dob ) }}">
                <span class="text-danger">@error('dob') {{ $message }} @enderror</span>
            </div>
            

            <!-- Email Field -->
            <div class="mb-3">
                <label for="email" class="form-label">Email:</label>
                <input type="email" name="email" id="email" value="{{ old('email', $user->email) }}" class="form-control">
                @error('email')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <!-- Phone Field -->
            <div class="mb-3">
                <label for="phone" class="form-label">Phone:</label>
                <input type="text" name="phone" id="phone" value="{{ old('phone', $user->phone) }}" class="form-control">
                @error('phone')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <!-- Gender Field -->
            <div class="mb-3">
                <label for="gender" class="form-label">Gender:</label>
                <select name="gender" id="gender" class="form-select">
                    <option value="male" {{ $user->gender == 'male' ? 'selected' : '' }}>Male</option>
                    <option value="female" {{ $user->gender == 'female' ? 'selected' : '' }}>Female</option>
                    <option value="other" {{ $user->gender == 'other' ? 'selected' : '' }}>Other</option>
                </select>
            </div>

            <!-- Bio Field -->
            <div class="mb-3">
                <label for="bio" class="form-label">Bio:</label>
                <textarea name="bio" id="bio" class="form-control" rows="4">{{ old('bio', $user->bio) }}</textarea>
            </div>

            <!-- Submit Button -->
            <button type="submit" class="btn btn-success">Update User</button>
        </form>
    </div>
    @endsection

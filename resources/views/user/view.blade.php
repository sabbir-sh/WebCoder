@extends('layout')

@section('content')
    <!-- Main Content -->
    <div class="main-content">
        <h4 class="text-primary">User Details</h4>
        <hr>
        <div class="p-4 col-6 bg-light rounded shadow">
            <p><strong>Name:</strong> {{ $user->name }}</p>
            <p><strong>Date of Birth:</strong> {{ $user->dob }}</p>
            <p><strong>Email:</strong> {{ $user->email }}</p>
            <p><strong>Phone:</strong> {{ $user->phone }}</p>
            <p><strong>Gender:</strong> {{ ucfirst($user->gender) }}</p>
            <p><strong>Bio:</strong> {{ $user->bio }}</p>

            <!-- Back Button -->
            <a href="{{ url()->previous() }}" class="btn btn-secondary">Back</a>
        </div>
    </div>
@endsection

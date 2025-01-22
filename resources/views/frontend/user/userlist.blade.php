@extends('frontend.layout.app') <!-- Extend the base layout -->

@section('custom-style')
<style>
    .title-design {
        color: blue;
    }
</style>
@endsection

@section('main-content')
<!-- Main Content Section -->
    <!-- User List Content -->
    <div class="user-list-container">
        <div class="container py-5">
            <!-- Section Header -->
            <div class="row">
                <div class="col-12">
                    <h1 class="about-us-title">Registered Users</h1>
                </div>
            </div>

            <!-- Content Section -->
            <div class="row mt-4">
                <div class="col-lg-12">
                    <ul class="list-group">
                        @forelse ($users as $user)
                            <li class="list-group-item">
                                <strong>{{ $user->name }}</strong> - {{ $user->email }}
                            </li>
                        @empty
                            <li class="list-group-item">No users found.</li>
                        @endforelse
                    </ul>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('custom-script')
<script>
// Add any JavaScript if needed
</script>
@endsection

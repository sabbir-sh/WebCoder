@extends('frontend.layout.app')

@section('custom-style')

@endsection
@section('main-content')

 <!-- Main Content Section -->
 <div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-lg-8">
            <div class="card shadow-sm">
                <div class="card-header bg-primary text-white">
                    <h4 class="mb-0">Job Application Form</h4>
                </div>
                <div class="card-body">
                     <!-- Display Success/Error Messages -->
                            <div class="col-12">
                                @if(session('error'))
                                    <div id="error_m" class="alert alert-danger">
                                        {{ session('error') }}
                                    </div>
                                @endif
                                @if(session('success'))
                                    <div id="success_m" class="alert alert-success">
                                        {{ session('success') }}
                                    </div>
                                @endif
                                @if ($errors->any())
                                    <div class="alert alert-danger">
                                        <ul>
                                            @foreach ($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif
                            </div>

                    <form action="{{ route('job_applications.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <div class="mb-3">
                            <label for="job_title" class="form-label">Job Title</label>
                            <input type="text" name="job_title" id="job_title" class="form-control" value="{{ old('job_title') }}" placeholder="Enter the job title">
                        </div>

                        <div class="mb-3">
                            <label for="type" class="form-label">Job Type</label>
                            <input type="text" name="type" id="type" class="form-control" value="{{ old('type') }}" placeholder="e.g., Full-time, Part-time">
                        </div>

                        <div class="mb-3">
                            <label for="file" class="form-label">Upload Resume</label>
                            <input type="file" name="file" id="file" class="form-control" accept=".pdf">
                        </div>

                        <div class="mb-3">
                            <label for="name" class="form-label">Your Name</label>
                            <input type="text" name="name" id="name" class="form-control" value="{{ old('name') }}" placeholder="Enter your full name" required>
                        </div>

                        <div class="mb-3">
                            <label for="email" class="form-label">Your Email</label>
                            <input type="email" name="email" id="email" class="form-control" value="{{ old('email') }}" placeholder="Enter your email address" required>
                        </div>

                        <div class="mb-3">
                            <label for="phone" class="form-label">Phone</label>
                            <input type="text" name="phone" id="phone" class="form-control" value="{{ old('phone') }}" placeholder="Enter your phone number">
                        </div>

                        <div class="mb-3">
                            <label for="expected_salary" class="form-label">Expected Salary</label>
                            <input type="number" name="expected_salary" id="expected_salary" class="form-control" value="{{ old('expected_salary') }}" placeholder="e.g., 50000">
                        </div>

                        <div class="mb-3">
                            <label for="message" class="form-label">Message</label>
                            <textarea name="message" id="message" class="form-control" rows="5" placeholder="Add any additional details here">{{ old('message') }}</textarea>
                        </div>

                        <div class="d-grid">
                            <button type="submit" class="btn btn-primary">Submit Application</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
    @endsection
    @section('custom-script')
    <script>

    </script>
    @endsection

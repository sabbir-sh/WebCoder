@extends('Backend.layout.app')

@section('custom-style')
<style>

</style>
@endsection
@section('main-content')

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-lg-8">
            <!-- Card for Application Details -->
            <div class="card shadow-lg">
                <div class="card-header bg-primary text-white">
                    <h4 class="mb-0">Application Details</h4>
                </div>
                <div class="card-body">
                    <table class="table table-bordered table-striped">
                        <tbody>
                            <tr>
                                <th class="text-muted">Job Title:</th>
                                <td>{{ $application->job_title }}</td>
                            </tr>
                            <tr>
                                <th class="text-muted">Job Type:</th>
                                <td>{{ $application->type }}</td>
                            </tr>
                            <tr>
                                <th class="text-muted">Name:</th>
                                <td>{{ $application->name }}</td>
                            </tr>
                            <tr>
                                <th class="text-muted">Phone:</th>
                                <td>{{ $application->phone }}</td>
                            </tr>
                            <tr>
                                <th class="text-muted">Email:</th>
                                <td>{{ $application->email }}</td>
                            </tr>
                            <tr>
                                <th class="text-muted">Expected Salary:</th>
                                <td>${{ number_format($application->expected_salary, 2) }}</td>
                            </tr>
                            <tr>
                                <th class="text-muted">Message:</th>
                                <td>{{ $application->message }}</td>
                            </tr>
                            <tr>
                                <th class="text-muted">Date Submitted:</th>
                                <td>{{ $application->created_at->format('d M Y, h:i A') }}</td>
                            </tr>
                        </tbody>
                    </table>

                    <!-- Download Button -->
                    @if($application->file)
                        <a href="{{ route('job_applications.download', $application->id) }}" class="btn btn-success mb-3">
                            <i class="fas fa-download"></i> Download File
                        </a>
                    @endif

                    <!-- Application Status -->
                    <div class="mb-4">
                        <p><strong>Application Status:</strong>
                            @if($application->is_seen)
                                <span class="badge bg-secondary">Already Downloaded</span>
                            @else
                                <span class="badge bg-warning text-dark">New</span>
                            @endif
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection

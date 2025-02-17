@extends('Backend.layout.app')

@section('custom-style')

<style>
    .table-light {
        background-color: #f8f9fa !important;
    }
    .table-success {
        background-color: #d4edda !important;
    }
</style>

@endsection
@section('main-content')

<div class="container-fluid mt-4">
    <div class="row justify-content-center">
        <div class="col-lg-12">
            <h3 class="mb-4">Job Applications</h3>
            @if ($applications->isEmpty())
                <div class="alert alert-info">No job applications found.</div>
            @else
                <table class="table table-bordered table-striped w-100">
                    <thead class="table-primary">
                        <tr>
                            <th>SL</th>
                            <th>Application Status</th>
                            <th>Date & Time</th>
                            <th>Job Title</th>
                            <th>Job Type</th>
                            <th>Name</th>
                            <th>Phone</th>
                            <th>Email</th>
                            <th>Expected Salary</th>
                            <th>Options</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($applications as $application)
                            <tr @if ($application->is_seen) class="table-light" @else class="table-success" @endif>
                                <td>{{ $loop->iteration }}</td>
                                <td>
                                    @if ($application->is_seen)
                                        <span class="badge bg-secondary">Already View</span>
                                    @else
                                        <span class="badge bg-success">New</span>
                                    @endif
                                </td>
                                <td>{{ \Carbon\Carbon::parse($application->created_at)->timezone('Asia/Dhaka')->format('d M Y, h:i A') }}</td>
                                <td>{{ $application->job_title }}</td>
                                <td>{{ $application->type }}</td>
                                <td>{{ $application->name }}</td>
                                <td>{{ $application->phone }}</td>
                                <td>{{ $application->email }}</td>
                                <td>BDT {{ number_format($application->expected_salary, 2) }}</td>
                                <td>
                                    <a href="{{ route('job_applications.show', $application->id) }}" class="btn btn-sm btn-info">
                                        <i class="fas fa-eye"></i> View
                                    </a>
                                    @if ($application->file)
                                        <a href="{{ route('job_applications.download', $application->id) }}" class="btn btn-sm btn-success">
                                            <i class="fas fa-download"></i>
                                        </a>
                                    @else
                                        N/A
                                    @endif
                                    <form action="{{ route('job_applications.destroy', $application->id) }}" method="POST" class="d-inline-block" onsubmit="return confirm('Are you sure?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @endif
        </div>
    </div>
</div>


@endsection

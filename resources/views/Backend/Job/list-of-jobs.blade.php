@extends('Backend.layout.app')

@section('custom-style')
<style>

</style>
@endsection
@section('main-content')

<div class="container mt-4">
    <div class="row justify-content-center">
        <div class="col-lg-12">
            <h3 class="mb-4">Job Applications</h3>
            @if($applications->isEmpty())
                <div class="alert alert-info">No job applications found.</div>
            @else
                <table class="table table-bordered table-striped">
                    <thead class="table-primary">
                        <tr>
                            <th>SL</th>
                            <th>Job Title</th>
                            <th>Job Type</th>
                            <th>Name</th>
                            <th>Phone</th>
                            <th>Email</th>
                            <th>Expected Salary</th>
                            <th>Message</th>


                            <th>Options</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($applications as $application)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $application->job_title }}</td>
                            <td>{{ $application->type }}</td>
                            <td>{{ $application->name }}</td>
                            <td>{{ $application->phone }}</td>
                            <td>{{ $application->email }}</td>
                            <td>${{ number_format($application->expected_salary, 2) }}</td>
                            <td>{{ $application->message }}</td>


                            <td>
                                @if($application->file)
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

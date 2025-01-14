@extends('Backend.layout.app')

@section('custom-style')
<style>

</style>
@endsection
@section('main-content')

<div class="container-fluid my-4">
    <h4 class="text-primary">{{ $welcome }}</h4>
    <h4 class="text-secondary">{{ $title }}</h4>
    <a href="{{ route('user.create') }}" class="btn btn-success btn-sm mb-3" title="Add User">Add User</a>
    <hr>

    @if($users->count() > 0)
    <div class="table-responsive">
        <table class="table table-bordered table-hover align-middle">
            <thead class="table-dark text-center">
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Date of Birth</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Gender</th>
                    <th>Bio</th>
                    <th>Created At</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($users as $user)
                <tr>
                    <td class="text-center">{{ $user->id }}</td>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->dob }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->phone }}</td>
                    <td>{{ ucfirst($user->gender) }}</td>
                    <td>{{ Str::limit($user->bio, 50) }}</td>
                 
                    <td>{{ $user->created_at->format('d M Y') }}</td>
                    <td class="text-center">
                        <!-- Edit Button -->
                        <a href="{{ route('sabbir.edit', $user->id) }}" class="btn btn-primary btn-sm" title="Edit">
                            <i class="fa-regular fa-pen-to-square"></i>
                        </a>
                        <!-- View Button -->
                        <a href="{{ route('sabbir.view', $user->id) }}" class="btn btn-info btn-sm text-white" title="View">
                            <i class="fa-regular fa-eye"></i>
                        </a>
                        <!-- Delete Button -->
                        <form action="{{ route('sabbir.destroy', $user->id) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm"
                                onclick="return confirm('Are you sure you want to delete this user?')"
                                title="Delete">
                                <i class="fa-solid fa-trash"></i>
                            </button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    @else
    <div class="alert alert-warning text-center">
        No users found.
    </div>
    @endif
</div>

@endsection
@section('custom-script')
<script>

</script>
@endsection

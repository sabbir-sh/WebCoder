@extends('layout')

@section('content')
 <!-- Main Content -->
    <div class="container-fluid">
        <h4 class="text-primary">{{$welcome}}</h4>
        <h4 class="text-secondary">{{$title}}</h4>
        <a href="{{route('user.create')}}" class="btn btn-success btn-sm" title="AddUser">Add User</a>
        <hr>

        @if($users->count() > 0)
        <div class="table-responsive">
            <table class="table table-striped table-hover">
                <thead class="table-dark">
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Date Of Birth</th>
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
                        <td>{{ $user->id }}</td>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->dob }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->phone }}</td>
                        <td>{{ $user->gender }}</td>
                        <td>{{ $user->bio }}</td>
                        <td>{{ $user->created_at->format('d M Y') }}</td>
                        <td>
                            <!-- Edit Button -->
                            <a href="{{ route('sabbir.edit', $user->id) }}" class="btn btn-sm btn-primary">
                                Edit
                            </a>
                            <a href="{{ route('sabbir.view', $user->id) }}" class="btn btn-sm btn-primary">
                                view
                            </a>
                            <!-- Delete Button -->
                            <form action="{{ route('sabbir.destroy', $user->id) }}" method="POST" style="display:inline-block;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger"
                                    onclick="return confirm('Are you sure you want to delete this user?')">
                                    Delete
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

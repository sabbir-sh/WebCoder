@extends('layout')

@section('content')
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">
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
                            <a href="{{ route('sabbir.edit', $user->id) }}" class="">
                                <i class="fas fa-edit"></i>
                                Edit
                            </a>
                            <a href="{{ route('sabbir.view', $user->id) }}" class="">
                                <i class="fas fa-eye"></i>
                                view
                            </a>
                            <!-- Delete Button -->
                            <form action="{{ route('sabbir.destroy', $user->id) }}" method="POST" style="display:inline-block;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class=""
                                    onclick="return confirm('Are you sure you want to delete this user?')">
                                    <i class="fas fa-trash-alt"></i>
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

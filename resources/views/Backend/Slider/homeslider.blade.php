@extends('backend.layout')

@section('content')
    <div class="container mt-4">
        <h1 class="text-center mb-4">Home Sliders</h1>
        <a href="{{ route('adminHomeSlider.create') }}" class="btn btn-success mb-3">Add New Slider</a>

        <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Title</th>
                    <th>Photo</th>
                    <th>Position</th>
                    <th>Subtitle</th>
                    <th>Offer</th>
                    <th>Published</th>
                    <th>link</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($sliders as $slider)
                    <tr>
                        <td>{{ $slider->id }}</td>
                        <td>{{ $slider->title }}</td>
                        <td>
                            <img src="{{ $slider->photo ? asset($slider->photo) : asset('images/default-image.jpg') }}"
                                 alt="Slider Image"
                                 class="w-50px">
                        </td>
                        <td>{{ $slider->position }}</td>
                        <td>{{ $slider->subtitle }}</td>
                        <td>{{ $slider->offer }}</td>
                        <td>{{ $slider->published ? 'Yes' : 'No' }}</td>
                        <td><b>{{ $slider->link }}</b></a></td>
                        <td>
                            <a href="{{ route('adminHomeSlider.edit', $slider->id) }}" class="btn btn-primary btn-sm">Edit</a>
                            <form action="{{ route('adminHomeSlider.destroy', $slider->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm"
                                    onclick="return confirm('Are you sure?')">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection

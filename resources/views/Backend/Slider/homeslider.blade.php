@extends('backend.layout')

@section('content')

<style>
    .form-switch {
    position: relative;
    display: inline-block;
    width: 34px;
    height: 20px;
}

.form-switch input {
    opacity: 0;
    width: 0;
    height: 0;
}

.slider {
    position: absolute;
    cursor: pointer;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background-color: #ccc;
    border-radius: 20px;
    transition: 0.4s;
}

.slider:before {
    position: absolute;
    content: "";
    height: 14px;
    width: 14px;
    left: 3px;
    bottom: 3px;
    background-color: white;
    border-radius: 50%;
    transition: 0.4s;
}

input:checked + .slider {
    background-color: #0aa07a;
}

input:checked + .slider:before {
    transform: translateX(14px);
}

</style>
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
                    <th>Link</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($sliders as $slider)
                    <tr>
                        <td>{{ $slider->id }}</td>
                        <td>{{ $slider->title }}</td>
                        <td>
                            <img src="{{ $slider->photo && file_exists(public_path($slider->photo))
                                          ? asset($slider->photo)
                                          : asset('images/default-image.jpg') }}"
                                 alt="Slider Image"
                                 class="img-thumbnail"
                                 style="width: 50px; height: 50px; object-fit: cover;">
                        </td>
                        <td>{{ $slider->position }}</td>
                        <td>{{ $slider->subtitle }}</td>
                        <td>{{ $slider->offer }}</td>
                        <td>
                            <label class="form-switch">
                                <input type="checkbox" class="form-check-input"
                                       onchange="updateStatus(this)"
                                       value="{{ $slider->id }}"
                                       {{ $slider->published ? 'checked' : '' }}>
                                <span class="slider round"></span>
                            </label>
                        </td>
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

<script>
    function updateStatus(element) {
    const sliderId = element.value;
    const isPublished = element.checked ? 1 : 0;

    fetch('/update-slider-status', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
        },
        body: JSON.stringify({ id: sliderId, published: isPublished })
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            alert('Status updated successfully!');
        } else {
            alert('Failed to update status.');
        }
    })
    .catch(error => {
        console.error('Error:', error);
        alert('An error occurred.');
    });
}

</script>

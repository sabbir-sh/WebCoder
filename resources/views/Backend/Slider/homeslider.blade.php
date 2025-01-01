@extends('Backend.layout.app')

@section('custom-style')
<style>

</style>
@endsection
@section('main-content')
    <div class="container mt-4">
        <h1 class="text-center mb-4"><b>{{ $title }}</b></h1>
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
                        <td>
                            <a href="{{ $slider->link }}" target="_blank" class="text-decoration-none">
                                <b>{{ $slider->link }}</b>
                            </a>
                        </td>
                        <td class="text-center">
                            <!-- Edit Button -->
                            <a href="{{ route('adminHomeSlider.edit', $slider->id) }}" class="btn btn-primary btn-sm" title="Edit">
                                <i class="fa-regular fa-pen-to-square"></i>
                            </a>

                            <!-- Delete Button -->
                            <form action="{{ route('adminHomeSlider.destroy', $slider->id) }}" method="POST" class="d-inline">
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

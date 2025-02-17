@extends('Backend.layout.app')

@section('custom-style')
<style>

</style>
@endsection
@section('main-content')
<div class="container-fluid my-1">
    <h1 class="text-center mb-4"><b>{{ $title }}</b></h1>
    <a href="{{ route('adminHomeSlider.create') }}" class="btn btn-success btn-sm mb-3">Add New Slider</a>
    <hr>

    @if($sliders->count() > 0)
    <div class="table-responsive">
        <table class="table table-bordered table-hover align-middle">
            <thead class="table-dark">
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
                        <td class="text-center">{{ $slider->id }}</td>
                        <td>{{ $slider->title }}</td>
                            <td class="text-center">
                                <img src="{{ $slider->photo && file_exists(public_path('storage/'.$slider->photo))
                                ? asset('storage/'.$slider->photo)
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
                            <input
                                type="checkbox"
                                class="form-check-input toggle-published"
                                data-id="{{ $slider->id }}"
                                {{ $slider->published ? 'checked' : '' }}
                                onchange="updateStatus(this)">
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
                                    onclick="return confirm('Are you sure you want to delete this slider?')"
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
        No sliders found.
    </div>
    @endif
</div>


@endsection

<script>
function updateStatus(el) {
    const sliderId = $(el).data('id'); // Get slider ID from the data attribute
    const status = el.checked ? 1 : 0; // Determine the status based on checkbox state

    $.ajax({
        url: '{{ route('sliders.status') }}', // Use the correct route
        type: 'POST',
        data: {
            _token: '{{ csrf_token() }}', // Include CSRF token
            id: sliderId,
            published: status,
        },
        success: function(response) {
            if (response.success) {
                AIZ.plugins.notify('success', response.message); // Notify success
            } else {
                AIZ.plugins.notify('danger', response.message); // Notify failure
            }
        },
        error: function(xhr) {
            AIZ.plugins.notify('danger', 'An error occurred. Please try again.'); // Notify general error
        },
    });
}

</script>


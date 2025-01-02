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
            <thead class="table-dark text-center">
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

                    <td class="text-center">
                        <label class="form-switch">
                            <input type="checkbox" class="form-check-input toggle-published"
                                   data-id="{{ $slider->id }}"
                                   {{ $slider->published ? 'checked' : '' }}>
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
 
</script>


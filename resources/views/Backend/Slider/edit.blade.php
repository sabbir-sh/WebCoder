@extends('Backend.layout.app')

@section('custom-style')
<style>

</style>
@endsection
@section('main-content')
<div class="card shadow-sm mt-4">
    <div class="card-header bg-primary text-white">
        <h5 class="mb-0 h6">{{ isset($slider) ? __('Edit Slider') : __('Add Slider') }}</h5>
    </div>

    <div class="card-body">
        <!-- Display Success/Error Messages -->
        <div class="col-12">
            @if(session('error'))
                <div id="error_m" class="alert alert-danger alert-dismissible fade show" role="alert">
                    {{ session('error') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
            @if(session('success'))
                <div id="success_m" class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
            @if ($errors->any())
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <ul class="mb-0">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
        </div>

        <!-- Form Start -->
        <form action="{{ isset($slider) ? route('adminHomeSlider.update', $slider->id) : route('adminHomeSlider.store') }}"
              method="POST" enctype="multipart/form-data">
            @csrf
            @if(isset($slider))
                @method('PUT')
            @endif

            <!-- Title -->
            <div class="mb-3 row">
                <label class="col-lg-2 col-form-label"><b>{{ __('Title') }}</b></label>
                <div class="col-lg-8">
                    <input type="text" class="form-control" name="title"
                           placeholder="{{ __('Enter Slider Title') }}"
                           value="{{ isset($slider) ? $slider->title : old('title') }}" required>
                </div>
            </div>

            <!-- Subtitle -->
            <div class="mb-3 row">
                <label class="col-lg-2 col-form-label"><b>{{ __('Subtitle') }}</b></label>
                <div class="col-lg-8">
                    <input type="text" class="form-control" name="subtitle"
                           placeholder="{{ __('Enter Slider Subtitle') }}"
                           value="{{ isset($slider) ? $slider->subtitle : old('subtitle') }}">
                </div>
            </div>

            <!-- Position -->
            <div class="mb-3 row">
                <label class="col-lg-2 col-form-label"><b>{{ __('Position') }}</b></label>
                <div class="col-lg-8">
                    <input type="text" class="form-control" name="position"
                           placeholder="{{ __('Enter Slider Position') }}"
                           value="{{ isset($slider) ? $slider->position : old('position') }}">
                </div>
            </div>

            <!-- Offer -->
            <div class="mb-3 row">
                <label class="col-lg-2 col-form-label"><b>{{ __('Offer') }}</b></label>
                <div class="col-lg-8">
                    <input type="text" class="form-control" name="offer"
                           placeholder="{{ __('Enter Offer Details') }}"
                           value="{{ isset($slider) ? $slider->offer : old('offer') }}">
                </div>
            </div>

            <!-- Link -->
            <div class="mb-3 row">
                <label class="col-lg-2 col-form-label"><b>{{ __('Link') }}</b></label>
                <div class="col-lg-8">
                    <input type="url" class="form-control" name="link"
                           placeholder="{{ __('Enter Slider Link') }}"
                           value="{{ isset($slider) ? $slider->link : old('link') }}">
                </div>
            </div>

            <!-- Photo -->
            <div class="mb-3 row">
                <label class="col-lg-2 col-form-label"><b>{{ __('Photo') }}</b></label>
                <div class="col-lg-8">
                    <div class="input-group">
                        <input type="file" name="photo" class="form-control" accept="image/*">
                        <label class="input-group-text">{{ __('Choose File') }}</label>
                    </div>
                    @if(isset($slider) && $slider->photo)
                        <div class="mt-3">
                            <img src="{{ asset($slider->photo) }}" alt="Current Image" class="img-thumbnail" style="width: 150px;">
                            <p class="text-muted mt-2">{{ __('Current Photo') }}</p>
                        </div>
                    @endif
                </div>
            </div>

            <!-- Published -->
            <div class="mb-3 row">
                <label class="col-lg-2 col-form-label"><b>{{ __('Published') }}</b></label>
                <div class="col-lg-8">
                    <select class="form-select" name="published">
                        <option value="1" {{ isset($slider) && $slider->published ? 'selected' : '' }}>{{ __('Yes') }}</option>
                        <option value="0" {{ isset($slider) && !$slider->published ? 'selected' : '' }}>{{ __('No') }}</option>
                    </select>
                </div>
            </div>

            <!-- Submit Button -->
            <div>
                <button type="submit" class="btn btn-primary">
                    {{ isset($slider) ? __('Update') : __('Save') }}
                </button>
            </div>
        </form>
    </div>
</div>

@endsection

@extends('Backend.layout.app')

@section('custom-style')
<style>

</style>
@endsection
@section('main-content')
<div class="card">
    <div class="card-header">
        <h5 class="mb-0 h6">{{ isset($slider) ? __('Edit Slider') : __('Add Slider') }}</h5>
    </div>

    <div class="card-body">
        <!-- Display Success/Error Messages -->
        <div class="col-12">
            @if(session('error'))
                <div id="error_m" class="alert alert-danger">
                    {{ session('error') }}
                </div>
            @endif
            @if(session('success'))
                <div id="success_m" class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
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

            <div class="form-group row">
                <label class="col-lg-2 col-form-label">{{ __('Title') }}</label>
                <div class="col-lg-8">
                    <input type="text" class="form-control" name="title"
                           placeholder="{{ __('Enter Slider Title') }}"
                           value="{{ isset($slider) ? $slider->title : old('title') }}" required>
                </div>
            </div>
            <br>
            <div class="form-group row">
                <label class="col-lg-2 col-form-label">{{ __('Subtitle') }}</label>
                <div class="col-lg-8">
                    <input type="text" class="form-control" name="subtitle"
                           placeholder="{{ __('Enter Slider Subtitle') }}"
                           value="{{ isset($slider) ? $slider->subtitle : old('subtitle') }}">
                </div>
            </div>
            <br>
            <div class="form-group row">
                <label class="col-lg-2 col-form-label">{{ __('Position') }}</label>
                <div class="col-lg-8">
                    <input type="text" class="form-control" name="position"
                           placeholder="{{ __('Enter Slider Position') }}"
                           value="{{ isset($slider) ? $slider->position : old('position') }}">
                </div>
            </div>
            <br>
            <div class="form-group row">
                <label class="col-lg-2 col-form-label">{{ __('Offer') }}</label>
                <div class="col-lg-8">
                    <input type="text" class="form-control" name="offer"
                           placeholder="{{ __('Enter Offer Details') }}"
                           value="{{ isset($slider) ? $slider->offer : old('offer') }}">
                </div>
            </div>
            <br>
            <div class="form-group row">
                <label class="col-lg-2 col-form-label">{{ __('Link') }}</label>
                <div class="col-lg-8">
                    <input type="url" class="form-control" name="link"
                           placeholder="{{ __('Enter Slider Link') }}"
                           value="{{ isset($slider) ? $slider->link : old('link') }}">
                </div>
            </div>
            <br>
            <div class="form-group row">
                <label class="col-lg-2 col-form-label">{{ __('Photo') }}</label>
                <div class="col-lg-8">
                    <!-- File Input -->
                    <div class="custom-file">
                        <input type="file" name="photo" class="custom-file-input" accept="image/*">
                        <label class="custom-file-label">{{ __('Choose File') }}</label>
                    </div>

                    <!-- Display Old Photo -->
                    @if(isset($slider) && $slider->photo)
                        <div class="mt-2">
                            <img src="{{ asset($slider->photo) }}" alt="Current Image" class="img-thumbnail" style="width: 150px;">
                            <p class="text-muted mt-1">{{ __('Current Photo') }}</p>
                        </div>
                    @endif
                </div>
            </div>

            <br>
            <div class="form-group row">
                <label class="col-lg-2 col-form-label">{{ __('Published') }}</label>
                <div class="col-lg-8">
                    <select class="form-control" name="published">
                        <option value="1" {{ isset($slider) && $slider->published ? 'selected' : '' }}>{{ __('Yes') }}</option>
                        <option value="0" {{ isset($slider) && !$slider->published ? 'selected' : '' }}>{{ __('No') }}</option>
                    </select>
                </div>
            </div>
            <br>
            <div class="form-group mb-0 text-right">
                <button type="submit" class="btn btn-primary">{{ isset($slider) ? __('Update') : __('Save') }}</button>
            </div>
        </form>
    </div>
</div>
@endsection

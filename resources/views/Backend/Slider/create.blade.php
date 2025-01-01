@extends('Backend.layout.app')

@section('custom-style')
<style>

</style>
@endsection
@section('main-content')
<div class="card shadow-sm">
    <div class="card-header bg-success text-black a">
        <h5 class="mb-0 h6">{{ __('Add New Slider') }}</h5>
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
        <form action="{{ route('adminHomeSlider.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <!-- Title -->
            <div class="mb-3 row">
                <label class="col-lg-2 col-form-label"><b>{{ __('Title') }}</b></label>
                <div class="col-lg-5">
                    <input type="text" class="form-control" name="title" placeholder="{{ __('Enter Slider Title') }}" value="{{ old('title') }}" required>
                </div>
            </div>

            <!-- Subtitle -->
            <div class="mb-3 row">
                <label class="col-lg-2 col-form-label"><b>{{ __('Subtitle') }}</b></label>
                <div class="col-lg-5">
                    <input type="text" class="form-control" name="subtitle" placeholder="{{ __('Enter Slider Subtitle') }}" value="{{ old('subtitle') }}">
                </div>
            </div>

            <!-- Position -->
            <div class="mb-3 row">
                <label class="col-lg-2 col-form-label"><b>{{ __('Position') }}</b></label>
                <div class="col-lg-5">
                    <input type="text" class="form-control" name="position" placeholder="{{ __('Enter Slider Position') }}" value="{{ old('position') }}">
                </div>
            </div>

            <!-- Offer -->
            <div class="mb-3 row">
                <label class="col-lg-2 col-form-label"><b>{{ __('Offer') }}</b></label>
                <div class="col-lg-5">
                    <input type="text" class="form-control" name="offer" placeholder="{{ __('Enter Offer Details') }}" value="{{ old('offer') }}">
                </div>
            </div>

            <!-- Link -->
            <div class="mb-3 row">
                <label class="col-lg-2 col-form-label"><b>{{ __('Link') }}</b></label>
                <div class="col-lg-5">
                    <input type="url" class="form-control" name="link" placeholder="{{ __('Enter Slider Link') }}" value="{{ old('link') }}">
                </div>
            </div>

            <!-- Photo -->
            <div class="mb-3 row">
                <label class="col-lg-2 col-form-label"><b>{{ __('Photo') }}</b></label>
                <div class="col-lg-5">
                    <div class="input-group">
                        <input type="file" name="photo" class="form-control" accept="image/*">
                        <label class="input-group-text">{{ __('Choose File') }}</label>
                    </div>
                </div>
            </div>

            <!-- Published -->
            <div class="mb-3 row">
                <label class="col-lg-2 col-form-label"><b>{{ __('Published') }}</b></label>
                <div class="col-lg-5">
                    <select class="form-select" name="published">
                        <option value="1" selected>{{ __('Yes') }}</option>
                        <option value="0">{{ __('No') }}</option>
                    </select>
                </div>
            </div>

            <!-- Submit Button -->
            <div class="form-group">
                <button type="submit" class="btn btn-success">{{ __('Save') }}</button>
            </div>
        </form>
    </div>
</div>

@endsection

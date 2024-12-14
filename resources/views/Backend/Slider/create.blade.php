@extends('Backend.layout.app')

@section('custom-style')
<style>

</style>
@endsection
@section('main-content')
<div class="card">
    <div class="card-header">
        <h5 class="mb-0 h6">{{ __('Add New Slider') }}</h5>
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
        <form action="{{ route('adminHomeSlider.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="form-group row">
                <label class="col-lg-2 col-form-label">{{ __('Title') }}</label>
                <div class="col-lg-8">
                    <input type="text" class="form-control" name="title" placeholder="{{ __('Enter Slider Title') }}" value="{{ old('title') }}" required>
                </div>
            </div>

            <div class="form-group row">
                <label class="col-lg-2 col-form-label">{{ __('Subtitle') }}</label>
                <div class="col-lg-8">
                    <input type="text" class="form-control" name="subtitle" placeholder="{{ __('Enter Slider Subtitle') }}" value="{{ old('subtitle') }}">
                </div>
            </div>

            <div class="form-group row">
                <label class="col-lg-2 col-form-label">{{ __('Position') }}</label>
                <div class="col-lg-8">
                    <input type="text" class="form-control" name="position" placeholder="{{ __('Enter Slider Position') }}" value="{{ old('position') }}">
                </div>
            </div>

            <div class="form-group row">
                <label class="col-lg-2 col-form-label">{{ __('Offer') }}</label>
                <div class="col-lg-8">
                    <input type="text" class="form-control" name="offer" placeholder="{{ __('Enter Offer Details') }}" value="{{ old('offer') }}">
                </div>
            </div>

            <div class="form-group row">
                <label class="col-lg-2 col-form-label">{{ __('Link') }}</label>
                <div class="col-lg-8">
                    <input type="url" class="form-control" name="link" placeholder="{{ __('Enter Slider Link') }}" value="{{ old('link') }}">
                </div>
            </div>

            <div class="form-group row">
                <label class="col-lg-2 col-form-label">{{ __('Photo') }}</label>
                <div class="col-lg-8">
                    <div class="custom-file">
                        <input type="file" name="photo" class="custom-file-input" accept="image/*">
                        <label class="custom-file-label">{{ __('Choose File') }}</label>
                    </div>
                </div>
            </div>

            <div class="form-group row">
                <label class="col-lg-2 col-form-label">{{ __('Published') }}</label>
                <div class="col-lg-8">
                    <select class="form-control" name="published">
                        <option value="1" selected>{{ __('Yes') }}</option>
                        <option value="0">{{ __('No') }}</option>
                    </select>
                </div>
            </div>

            <div class="form-group mb-0 text-right">
                <button type="submit" class="btn btn-primary">{{ __('Save') }}</button>
            </div>
        </form>
    </div>
</div>
@endsection

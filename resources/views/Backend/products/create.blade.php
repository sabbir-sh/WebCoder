
@extends('Backend.layout.app')

@section('custom-style')
<style>

</style>
@endsection
@section('main-content')
<div class="card">
    <div class="card-header">
        <h5 class="mb-0 h6">{{ __('Add New Products') }}</h5>
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
        <form action="{{ route('adminProducts.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="form-group row">
                <label class="col-lg-2 col-form-label">{{ __('Name') }}</label>
                <div class="col-lg-8">
                    <input type="text" class="form-control" name="name" placeholder="{{ __('Enter Product Name') }}" value="{{ old('name') }}" required>
                </div>
            </div>

            <div class="form-group row">
                <label class="col-lg-2 col-form-label">{{ __('Description') }}</label>
                <div class="col-lg-8">
                    <textarea class="form-control" name="description" placeholder="{{ __('Enter Product Description') }}">{{ old('description') }}</textarea>
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
                <label class="col-lg-2 col-form-label">{{ __('Price') }}</label>
                <div class="col-lg-8">
                    <input type="number" class="form-control" name="price" placeholder="{{ __('Enter Product Price') }}" step="0.01" value="{{ old('price') }}" required>
                </div>
            </div>

            <div class="form-group row">
                <label class="col-lg-2 col-form-label">{{ __('Quantity') }}</label>
                <div class="col-lg-8">
                    <input type="number" class="form-control" name="quantity" placeholder="{{ __('Enter Product Quantity') }}" value="{{ old('quantity') }}" required>
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
                <button type="submit" class="btn btn-primary">{{ __('Add Product') }}</button>
            </div>

        </form>
    </div>
</div>
@endsection

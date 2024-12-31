
@extends('Backend.layout.app')

@section('custom-style')
<style>

</style>
@endsection
@section('main-content')
<div class="container mt-5">
    <div class="card shadow">
        <div class="card-header bg-success text-white">
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
                        <ul class="mb-0">
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

                <!-- Product Name -->
                <div class="form-group row mb-3">
                    <label for="name" class="col-lg-2 col-form-label">{{ __('Name') }}</label>
                    <div class="col-lg-8">
                        <input type="text" id="name" class="form-control" name="name" placeholder="{{ __('Enter Product Name') }}" value="{{ old('name') }}" required>
                    </div>
                </div>

                <!-- Description -->
                <div class="form-group row mb-3">
                    <label for="description" class="col-lg-2 col-form-label">{{ __('Description') }}</label>
                    <div class="col-lg-8">
                        <textarea id="description" class="form-control" name="description" placeholder="{{ __('Enter Product Description') }}">{{ old('description') }}</textarea>
                    </div>
                </div>

                <!-- Photo -->
                <div class="form-group row mb-3">
                    <label for="photo" class="col-lg-2 col-form-label">{{ __('Photo') }}</label>
                    <div class="col-lg-8">
                        <div class="custom-file">
                            <input type="file" id="photo" name="photo" class="custom-file-input" accept="image/*">
                            <label class="custom-file-label" for="photo">{{ __('Choose File') }}</label>
                        </div>
                    </div>
                </div>

                <!-- Price -->
                <div class="form-group row mb-3">
                    <label for="price" class="col-lg-2 col-form-label">{{ __('Price') }}</label>
                    <div class="col-lg-8">
                        <input type="number" id="price" class="form-control" name="price" placeholder="{{ __('Enter Product Price') }}" step="0.01" value="{{ old('price') }}" required>
                    </div>
                </div>

                <!-- Quantity -->
                <div class="form-group row mb-3">
                    <label for="quantity" class="col-lg-2 col-form-label">{{ __('Quantity') }}</label>
                    <div class="col-lg-8">
                        <input type="number" id="quantity" class="form-control" name="quantity" placeholder="{{ __('Enter Product Quantity') }}" value="{{ old('quantity') }}" required>
                    </div>
                </div>

                <!-- Published -->
                <div class="form-group row mb-3">
                    <label for="published" class="col-lg-2 col-form-label">{{ __('Published') }}</label>
                    <div class="col-lg-8">
                        <select id="published" class="form-control" name="published">
                            <option value="1" selected>{{ __('Yes') }}</option>
                            <option value="0">{{ __('No') }}</option>
                        </select>
                    </div>
                </div>

                <!-- Submit Button -->
                <div class="form-group mb-0 text-right">
                    <button type="submit" class="btn btn-success">{{ __('Add Product') }}</button>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection

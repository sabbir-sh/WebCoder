@extends('Backend.layout.app')

@section('custom-style')
<style>

</style>
@endsection

@section('main-content')
<div class="container-fluid vh-100 d-flex flex-column mt-5">
    <!-- Page Header -->
    <div class="row mb-4">
        <div class="col-md-6">
            <h1 class="text-start"><strong>All Products</strong></h1>
        </div>
        <div class="col-md-6 text-end">
            <a href="{{ route('adminProducts.create') }}" class="btn btn-success">
                <i class="fa-solid fa-plus me-1"></i> Add New Product
            </a>
        </div>
    </div>

    <!-- Products Table -->
    <div class="table-responsive shadow-sm rounded bg-white p-1 flex-grow-1">
        <table class="table table-bordered table-hover align-middle">
            <thead class="table-dark text-center">
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Photo</th>
                    <th>Price</th>
                    <th>Quantity</th>
                    <th>Published</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($products as $product)
                <tr>
                    <!-- Product ID -->
                    <td class="text-center">{{ $product->id }}</td>

                    <!-- Product Name -->
                    <td>{{ $product->name }}</td>

                    <!-- Product Photo -->
                    <td class="text-center">
                        <img src="{{ $product->photo && file_exists(public_path($product->photo))
                                      ? asset($product->photo)
                                      : asset('images/default-image.jpg') }}"
                             alt="Product Image"
                             class="img-thumbnail product-image"
                             style="width: 80px; height: 80px; object-fit: cover;">
                    </td>

                    <!-- Product Price -->
                    <td class="text-end">{{ number_format($product->price, 2) }} BDT</td>

                    <!-- Product Quantity -->
                    <td class="text-center">{{ $product->quantity }}</td>

                    <!-- Product Published -->
                    <td class="text-center">
                        <label class="form-switch">
                            <input type="checkbox" class="form-check-input toggle-published"
                                   data-id="{{ $product->id }}"
                                   {{ $product->published ? 'checked' : '' }}
                                   onchange="updateStatus(this)">
                            <span class="slider round"></span>
                        </label>
                    </td>

                    <!-- Actions -->
                    <td class="text-center actions-btn">
                        <!-- Edit Button -->
                        <a href="{{ route('adminProducts.edit', $product->id) }}" class="btn btn-primary btn-sm me-1" title="Edit">
                            <i class="fa-regular fa-pen-to-square"></i>
                        </a>

                        <!-- Delete Button -->
                        <form action="{{ route('adminProducts.destroy', $product->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this product?')" title="Delete">
                                <i class="fa-solid fa-trash"></i>
                            </button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

@endsection

<script>

</script>

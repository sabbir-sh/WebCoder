@extends('Backend.layout.app')

@section('custom-style')
<style>

</style>
@endsection

@section('main-content')
<div class="container-fluid my-1">
    <!-- Page Header -->

    <div class="container-fluid my-1">
        <h1 class="text-center mb-2"><b>{{ $title }}</b></h1>
        <a href="{{ route('adminProducts.create') }}" class="btn btn-success btn-sm mb-3">Add New Products</a>
        <hr>

    <!-- Products Table -->

     @if($products->count() > 0)
    <div class="table-responsive">
        <table class="table table-bordered table-hover">
            <thead class="table-dark">
                <tr>
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
                        <!-- Product Name -->
                        <td>{{ $product->name }}</td>

                        <!-- Product Photo -->
                        <td>
                            <img src="{{ $product->photo && file_exists(public_path('storage/'.$product->photo))
                                        ? asset('storage/'.$product->photo)
                                        : asset('images/default-image.jpg') }}"
                                 alt="Product Image"
                                 class="img-thumbnail product-image"
                                 style="width: 80px; height: 80px; object-fit: cover;">
                        </td>

                        <!-- Product Price -->
                        <td class="text-end">{{ number_format($product->price, 2) }} BDT</td>

                        <!-- Product Quantity -->
                        <td>{{ $product->quantity }}</td>

                        <!-- Product Published -->
                        <td>
                            <label class="form-switch">
                                <input
                                    type="checkbox"
                                    class="form-check-input toggle-published"
                                    data-id="{{ $product->id }}"
                                    {{ $product->published ? 'checked' : '' }}
                                    onchange="updateStatus(this)">
                                <span class="slider round"></span>
                            </label>
                        </td>

                        <!-- Actions -->
                        <td class="text-center">
                            <!-- Edit Button -->
                            <a href="{{ route('adminProducts.edit', $product->id) }}" class="btn btn-primary btn-sm me-2" title="Edit">
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
    @else
    <div class="alert alert-warning text-center">
        No products found.
    </div>
    @endif
</div>



@endsection

<script>
function updateStatus(el) {
    const productId = $(el).data('id'); // Get product ID from the data attribute
    const status = el.checked ? 1 : 0; // Determine the new status

    $.ajax({
        url: '{{ route('sliders.status') }}', // Ensure the route matches
        type: 'POST',
        data: {
            _token: '{{ csrf_token() }}', // Include CSRF token
            id: productId,
            published: status,
        },
        success: function(response) {
            if (response.success) {
                AIZ.plugins.notify('success', response.message); // Show success notification
            } else {
                AIZ.plugins.notify('danger', response.message); // Show error notification
            }
        },
        error: function(xhr) {
            AIZ.plugins.notify('danger', 'An error occurred. Please try again.'); // Show error notification
        },
    });
}

</script>

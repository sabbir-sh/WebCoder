@extends('Backend.layout.app')

@section('custom-style')
<style>

</style>
@endsection
@section('main-content')
    <div class="container mt-4">
        <h1 class="text-center mb-4">All Products</h1>
        <a href="{{ route('adminProducts.create') }}" class="btn btn-success mb-3">Add New Slider</a>

        <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Description</th>
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
                    <td>{{ $product->id }}</td>
                    <td>{{ $product->name }}</td>
                    <td>{{ $product->description }}</td>
                    <td>
                        <img src="{{ $product->photo && file_exists(public_path($product->photo))
                                      ? asset($product->photo)
                                      : asset('images/default-image.jpg') }}"
                             alt="Product Image"
                             class="img-thumbnail"
                             style="width: 60px; height: 60px; object-fit: cover;">
                    </td>
                    <td>${{ $product->price }}</td>
                    <td>{{ $product->quantity }}</td>
                    <td>
                        <label class="form-switch">
                            <input type="checkbox" class="form-check-input"
                                   onchange="updateStatus(this)"
                                   value="{{ $product->id }}"
                                   {{ $product->published ? 'checked' : '' }}>
                            <span class="product round"></span>
                        </label>
                    </td>

                    <td>
                        <a href="{{ route('adminProducts.edit', $product->id) }}" class="btn btn-primary btn-sm">Edit</a>
                        <form action="{{ route('adminProducts.destroy', $product->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm"
                                onclick="return confirm('Are you sure you want to delete this product?')">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection

<script>
    function updateStatus(element) {
    const sliderId = element.value;
    const isPublished = element.checked ? 1 : 0;

    fetch('/update-slider-status', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
        },
        body: JSON.stringify({ id: sliderId, published: isPublished })
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            alert('Status updated successfully!');
        } else {
            alert('Failed to update status.');
        }
    })
    .catch(error => {
        console.error('Error:', error);
        alert('An error occurred.');
    });
}

</script>

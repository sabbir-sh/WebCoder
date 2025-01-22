@extends('frontend.layout.app')

@section('main-content')
<div class="container py-5">
    <h1 class="text-center">All Products</h1>

    <div class="row">
        @forelse ($products as $product)
            <div class="col-md-4 mb-4">
                <div class="card">
                    <img src="{{ asset('storage/' . $product->image) }}" class="card-img-top" alt="{{ $product->name }}">
                    <div class="card-body">
                        <h5 class="card-title">{{ $product->name }}</h5>
                        <p class="card-text">{{ $product->description }}</p>
                        <p class="card-text"><strong>Price:</strong> ${{ $product->price }}</p>

                    </div>
                </div>
            </div>
        @empty
            <div class="col-12">
                <p class="text-center">No products available.</p>
            </div>
        @endforelse
    </div>
</div>
@endsection

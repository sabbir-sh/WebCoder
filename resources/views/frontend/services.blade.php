@extends('frontend.layout.app')

@section('custom-style')
{{-- <style>
    .title-design {
        color:blue;
    }
</style> --}}
@endsection
@section('main-content')
    {{-- <div class="container-fluid">
        <h3 class="text-center">{{ $page_title }}</h3>
    </div> --}}
    <div class="image-container position-relative">
        <img src="{{ asset('assets/AboutUs_banner.jpg') }}" class="d-block w-100" alt="About Us Banner">
        <div class="text-overlay">
            <h3 class="text-center">{{ $page_title }}</h3>
        </div>
    </div>
 <!-- Main Content Section -->
 <div class="container mt-5">
    <div class="text-center mb-5">
        <h2 class="fw-bold">Featured Services</h2>
    </div>

    <div class="row g-4 justify-content-center">
        <!-- Service 1: Desktop Services -->
        <div class="col-md-4 col-lg-2">
            <a href="{{ url('/desktop-services') }}" class="text-decoration-none">
                <div class="card shadow-sm border-0">
                    <img src="{{ asset('assets/desktop.webp') }}" alt="Featured Services" class="card-img-top p-3" style="max-width: 100%; height: auto;">
                    <div class="card-body text-center">
                        <h5 class="card-title">Desktop Services</h5>
                        <p class="card-text">Starts from: 500৳</p>
                    </div>
                </div>
            </a>
        </div>

        <!-- Service 2: Laptop Services -->
        <div class="col-md-4 col-lg-2">
            <a href="{{ url('/laptop-services') }}" class="text-decoration-none">
                <div class="card shadow-sm border-0">
                    <img src="{{ asset('assets/laptop.webp') }}" alt="Featured Services" class="card-img-top p-3" style="max-width: 100%; height: auto;">
                    <div class="card-body text-center">
                        <h5 class="card-title">Laptop Services</h5>
                        <p class="card-text">Starts from: 1000৳</p>
                    </div>
                </div>
            </a>
        </div>

        <!-- Service 3: Desktop Services -->
        <div class="col-md-4 col-lg-2">
            <div class="card shadow-sm border-0">
                <img src="{{ asset('assets/desktop.webp') }}" alt="Featured Services" class="card-img-top p-3" style="max-width: 100%; height: auto;">
                <div class="card-body text-center">
                    <h5 class="card-title">Desktop Services</h5>
                    <p class="card-text">Starts from: 500৳</p>
                </div>
            </div>
        </div>

        <!-- Service 4: Desktop Services -->
        <div class="col-md-4 col-lg-2">
            <div class="card shadow-sm border-0">
                <img src="{{ asset('assets/desktop.webp') }}" alt="Featured Services" class="card-img-top p-3" style="max-width: 100%; height: auto;">
                <div class="card-body text-center">
                    <h5 class="card-title">Desktop Services</h5>
                    <p class="card-text">Starts from: 500৳</p>
                </div>
            </div>
        </div>

        <!-- Service 5: Desktop Services -->
        <div class="col-md-4 col-lg-2">
            <div class="card shadow-sm border-0">
                <img src="{{ asset('assets/desktop.webp') }}" alt="Featured Services" class="card-img-top p-3" style="max-width: 100%; height: auto;">
                <div class="card-body text-center">
                    <h5 class="card-title">Desktop Services</h5>
                    <p class="card-text">Starts from: 500৳</p>
                </div>
            </div>
        </div>

        <!-- Service 6: Desktop Services -->
        <div class="col-md-4 col-lg-2">
            <div class="card shadow-sm border-0">
                <img src="{{ asset('assets/desktop.webp') }}" alt="Featured Services" class="card-img-top p-3" style="max-width: 100%; height: auto;">
                <div class="card-body text-center">
                    <h5 class="card-title">Desktop Services</h5>
                    <p class="card-text">Starts from: 500৳</p>
                </div>
            </div>
        </div>
    </div>
</div>



    @endsection
    @section('custom-script')
    <script>

    </script>
    @endsection

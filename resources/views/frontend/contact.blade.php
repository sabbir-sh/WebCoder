@extends('frontend.layout.app')

@section('custom-style')
<style>
    .title-design {
        color:green;
    }
</style>
@endsection
@section('main-content')
{{--
    <div class="container-fluid">
        <h3 class="text-center title-design">{{ $page_title }}</h3>
    </div> --}}
    <div class="image-container position-relative">
        <img src="{{ asset('assets/AboutUs_banner.jpg') }}" class="d-block w-100" alt="About Us Banner">
        <div class="text-overlay">
            <h3 class="text-center">{{ $page_title }}</h3>
        </div>
    </div>
 <!-- Main Content Section -->



 <div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-12 p-4 bg-light border rounded shadow">
            <h3 class="text-center mb-4">Contact Us</h3>
            <p class="text-center mb-4">
                Have questions? Feel free to reach out by filling out the form below. We'll get back to you as soon as possible!
            </p>
            <form action="#" method="POST">
                <div class="mb-3">
                    <label for="name" class="form-label">Full Name</label>
                    <input type="text" class="form-control" id="name" name="name" placeholder="Enter your full name" required>
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">Email Address</label>
                    <input type="email" class="form-control" id="email" name="email" placeholder="Enter your email" required>
                </div>
                <div class="mb-3">
                    <label for="message" class="form-label">Message</label>
                    <textarea class="form-control" id="message" name="message" rows="4" placeholder="Type your message here" required></textarea>
                </div>
                <button type="submit" class="btn btn-primary w-100">Submit</button>
            </form>
        </div>
    </div>
</div>

    @endsection
    @section('custom-script')
    <script>

    </script>
    @endsection

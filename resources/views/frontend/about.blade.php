@extends('frontend.layout.app')

@section('custom-style')
<style>
    .title-design {
        color:blue;
    }
</style>
@endsection
@section('main-content')
    {{-- <div class="container-fluid">
        <h3 class="text-center">{{ $page_title }}</h3>
    </div> --}}
 <!-- Main Content Section -->
 <div id="homepageSlider" class="carousel slide" data-bs-ride="carousel">
    <!-- Indicators -->
        <!-- Slide 1 -->
        <div class="image-container position-relative">
            <img src="{{ asset('assets/AboutUs_banner.jpg') }}" class="d-block w-100" alt="About Us Banner">
            <div class="text-overlay">
                <h3 class="text-center">{{ $page_title }}</h3>
            </div>
        </div>

                <!-- Main Content -->
                <div class="about-us-container">
                    <div class="container py-5">
                        <!-- Section Header -->
                        <div class="row">
                            <div class="col-12">
                                <h1 class="about-us-title">About Us.</h1>
                            </div>
                        </div>

                        <!-- Content Section -->
                        <div class="row mt-4">
                            <div class="col-lg-12">

                                <p class="content-text">
                                    At [Your Website Name], we believe in delivering [your core values or mission, e.g., "exceptional quality,
                                    innovative solutions, and personalized service"]. Since our inception, we have been committed to
                                    [your purpose or mission, e.g., "helping individuals and businesses achieve their goals through our
                                    cutting-edge solutions"]. </p>
                                    <h2 class="content-title">Who We Are</h2>
                                    <p class="content-text">
                                        We are a passionate team of [your industry or expertise, e.g., "designers, developers, and strategists"],
                                        driven by creativity and a dedication to excellence. Our journey began with the vision to
                                         [your vision, e.g., "bridge the gap between ideas and execution"].
                                    </p>
                                    <h2 class="content-title">What We Do</h2>
                                        <p class="content-text">
                                            Experience: With [X years] of expertise in the industry, we know what it takes to deliver exceptional results.
                                            Customer Focus: Your satisfaction is our priority. We listen, understand, and tailor our services to meet your needs.
                                            Innovation: We stay ahead of the curve, adopting the latest trends and technologies to keep you ahead of the competition. </p>
                                             <h2 class="content-title">Our Mission</h2>
                                             <p class="content-text">
                                                To empower businesses and individuals by providing [specific goals, e.g., "innovative solutions and unparalleled support"] that drive success and growth.</p>



                                <!-- Add more content as needed -->
                            </div>
                        </div>
                    </div>
                </div>





    @endsection
    @section('custom-script')
    <script>

    </script>
    @endsection

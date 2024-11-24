@extends('frontend.layout.app')

@section('custom-style')
<style>
    .title-design {
        color:blue;
    }
</style>
@endsection
@section('main-content')
    <div class="container-fluid">
        <h3 class="text-center">{{ $page_title }}</h3>
    </div>
 <!-- Main Content Section -->
 <div id="homepageSlider" class="carousel slide" data-bs-ride="carousel">
    <!-- Indicators -->

    <!-- Slider Items -->
    <div class="carousel-inner">
        <!-- Slide 1 -->
        <div class="carousel-item active">
            <img src="{{ asset('assets/banner_1.jpg') }}" class="d-block w-100" alt="Slide 1">
            <div class="carousel-caption d-none d-md-block">
                <h5>Welcome to Our Website</h5>
                <p> {{ $banner_title1 }}</p>
            </div>
        </div>
    </div>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-12 p-0 bg-light border rounded shadow">
                <h3 class="text-center">Welcome to [Your Company Name] – Your Partner in Technology and Growth</h3>
                <p>
                   At [Your Company Name], we specialize in delivering innovative IT solutions designed to empower businesses of all sizes. Whether you're a startup looking to establish your digital presence or a growing enterprise in need of robust technical support, we’re here to help you succeed. Who We Are We are a team of passionate professionals with expertise in WordPress development, PHP Laravel solutions, and digital marketing strategies. With years of experience and a commitment to excellence, we craft custom solutions tailored to meet the unique needs of each client. Our mission is simple: to help businesses thrive in a fast-paced, technology-driven world. What We Do Website Development From sleek, responsive designs on WordPress to powerful, scalable platforms built with PHP Laravel, we bring your vision to life. Your website is your digital storefront, and we ensure it’s not only visually stunning but also user-friendly and optimized for performance. Custom IT Solutions We offer tailored solutions using PHP Laravel, creating robust, secure, and scalable applications to streamline your business operations. Digital Marketing Let your brand stand out! Our digital marketing services include SEO, social media management, content marketing, and paid campaigns that drive measurable results and increase your online visibility. Ongoing Support We don’t just build; we maintain, optimize, and grow your digital assets. Our dedicated team is always ready to provide technical support and guidance to keep your systems running smoothly. Why Choose Us? Customer-Centric Approach: Your success is our success. We listen to your needs and deliver tailored solutions. Quality Assurance: Excellence is at the core of everything we do, ensuring every project meets the highest standards. Innovative Thinking: We stay ahead of the curve, leveraging the latest technologies and trends to keep your business competitive. Transparent Communication: You’ll always know where your project stands, with clear and open communication throughout the process. At [Your Company Name], we believe in building long-term partnerships based on trust, innovation, and mutual success. Let us help you transform your ideas into reality and achieve your business goals. Contact us today to learn how we can help elevate your business to new heights!
                </p>
            </div>
        </div>
    </div>


    @endsection
    @section('custom-script')
    <script>

    </script>
    @endsection

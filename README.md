<div class="container-fluid p-0">
    <div class="row g-0">
        <div class="col-12">
            <!-- Banner image with fixed dimensions -->
            <img src="assets/banner1.jpg" alt="Banner Image" class="img-fluid mx-auto d-block"
                 style="width: 1200px; height: 400px; object-fit: cover;">
        </div>
    </div>
</div>



{{-- Section 1 --}}
    <div class="container my-5">
        <div class="row justify-content-center">
            <!-- Apple -->
            <div class="col-4 col-md-3 mb-4">
                <img src="{{ asset('assets/apple.webp') }}" alt="Apple Certified Technician" class="img-fluid mb-2">

            </div>

            <!-- Dell -->
            <div class="col-4 col-md-3 mb-4">
                <img src="{{ asset('assets/dell.webp') }}" alt="Dell Authorized Service Center" class="img-fluid mb-2">

            </div>

            <!-- HP -->
            <div class="col-4 col-md-3 mb-4">
                <img src="{{ asset('assets/hp.webp') }}" alt="HP Authorized Service Center" class="img-fluid mb-2">

            </div>

            <!-- Lenovo -->
            <div class="col-4 col-md-3 mb-4">
                <img src="{{ asset('assets/lenovo.webp') }}" alt="Lenovo Authorized Service Partner" class="img-fluid mb-2">

            </div>
        </div>
    </div>

{{-- Section 2 --}}
    <div class="container-fluid bg-secondary text-white text-center" style="padding: 4rem 0;">
        <h1 class="display-4">You ideate, we take care of the rest.</h1>
        <p class="lead">Bring your ideas to life effortlessly with our support.</p>
        <a href={{'/services'}} class="btn btn-light btn-lg">Get Started</a>
    </div>


 {{-- Section 3 --}}
 <div class="container-fluid custom-section">
    <div class="row">
        <!-- Image Section -->
        <div class="col-md-5 p-5">
            <div class="custom-images">
                <img src="assets/se1.png" alt="Team Collaboration" class="img-fluid w-100">
            </div>
        </div>
        <!-- Text Section -->
        <div class="col-md-7 d-flex align-items-center bg-light">
            <div class="text-section p-4">
                <h1>Exclusive technology to provide IT solutions</h1>
                <p>
                    Over time, we have built a reputation for providing excellent client satisfaction, as demonstrated by our diverse solutions and exceptional services.
                </p>
                <p>
                    Each demo we create is tailored and unique, allowing you to customize your website's appearance with just a few clicks. Let us transform your vision into reality.
                </p>
                <a href={{'/services'}} class="btn btn-dark btn-lg">Get Started</a>
            </div>
        </div>
    </div>
</div>

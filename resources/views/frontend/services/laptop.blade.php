@extends('frontend.layout.app')

@section('custom-style')

@endsection
@section('main-content')

<div class="container mt-5">
    <div class="row">
        <!-- Laptop Services Heading -->
        <div class="col-12 text-center mb-4">
            <h2>Laptop Services</h2>
            <p>Under the Laptop Services, you can avail the following services:</p>
        </div>

        <!-- Hardware Services -->
        <div class="col-md-6">
            <div class="card">
                <div class="card-header bg-primary text-white">
                    <h4 class="mb-0">Hardware Services</h4>
                </div>
                <div class="card-body">
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item">Hinges Broken</li>
                        <li class="list-group-item">Charging and Touchpad Issues Solve</li>
                        <li class="list-group-item">LVDS (Ribbon) Change</li>
                        <li class="list-group-item">Display/Battery/Keyboard Change</li>
                        <li class="list-group-item">New Component Installation</li>
                        <li class="list-group-item">No Power & Display Issue Solve</li>
                        <li class="list-group-item">Blue Screen Issue Solve</li>
                        <li class="list-group-item">Basic Data Recovery</li>
                    </ul>
                </div>
            </div>
        </div>

        <!-- Software Services -->
        <div class="col-md-6">
            <div class="card">
                <div class="card-header bg-success text-white">
                    <h4 class="mb-0">Software Services</h4>
                </div>
                <div class="card-body">
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item">Basic Software Installation</li>
                        <li class="list-group-item">BIOS Firmware Update</li>
                        <li class="list-group-item">Antivirus Setup and Renew</li>
                        <li class="list-group-item">Mac OS Setup</li>
                        <li class="list-group-item">Linux Setup</li>
                        <li class="list-group-item">Windows Setup</li>
                    </ul>
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

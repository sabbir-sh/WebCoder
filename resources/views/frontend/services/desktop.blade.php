@extends('frontend.layout.app')

@section('custom-style')

@endsection
@section('main-content')

 <!-- Main Content Section -->

 <div class="container mt-5">
    <div class="row">
        <!-- Desktop Services Heading -->
        <div class="col-12 text-center mb-4">
            <h2>Desktop Services</h2>
            <p>Under the Desktop Services, you can avail the following services:</p>
        </div>

        <!-- Hardware Services -->
        <div class="col-md-6">
            <div class="card">
                <div class="card-header bg-primary text-white">
                    <h4 class="mb-0">Hardware Services</h4>
                </div>
                <div class="card-body">
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item">Component Upgrades</li>
                        <li class="list-group-item">Disassembly and Cable Management</li>
                        <li class="list-group-item">Basic Data Recovery</li>
                        <li class="list-group-item">Graphics Card Repair</li>
                        <li class="list-group-item">Motherboard Repair</li>
                        <li class="list-group-item">Blue Screen Issue Troubleshooting</li>
                        <li class="list-group-item">Power and Display Issue Resolution</li>
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
                        <li class="list-group-item">Linux Setup</li>
                        <li class="list-group-item">BIOS Firmware Updates</li>
                        <li class="list-group-item">Windows Setup</li>
                        <li class="list-group-item">Antivirus Setup and Renewal</li>
                        <li class="list-group-item">Mac OS Setup</li>
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

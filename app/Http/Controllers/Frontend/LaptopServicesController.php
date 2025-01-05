<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LaptopServicesController extends Controller
{
    public function LaptopServices()
    {
        // Logic to handle the request
        return view('frontend.services.laptop');
    }
}

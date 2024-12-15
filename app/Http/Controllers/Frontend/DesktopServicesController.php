<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DesktopServicesController extends Controller
{
    public function DesktopServices()
    {
        // Logic to handle the request
        return view('frontend.services.desktop');
    }
}

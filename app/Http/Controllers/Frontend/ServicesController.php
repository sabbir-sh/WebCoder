<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ServicesController extends Controller
{
    public function services(){
        $data['page_title'] = 'Services Page';
        return view('frontend.services', $data);
    }
}

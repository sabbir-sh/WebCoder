<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Http\Services\HomeService;
use Illuminate\Http\Request;

class ContactUsController extends Controller
{
    public function contact(){
        $service = new HomeService();
        $data = $service->homeSliderData();
        $data['page_title'] = 'Contact Us Page';
        return view('frontend.contact',$data);
    }
}

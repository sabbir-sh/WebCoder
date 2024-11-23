<?php

namespace App\Http\Controllers\Frontend;
use App\Http\Controllers\Controller;
use App\Http\Services\HomeService;
use Illuminate\Http\Request;

class AboutUsController extends Controller
{
    public function about(){
        $homeServiceData = new HomeService();
        $data = $homeServiceData->homeSliderData();
        $data['page_title'] = "About Us Page";
        return view('frontend.about', $data);
    }
}

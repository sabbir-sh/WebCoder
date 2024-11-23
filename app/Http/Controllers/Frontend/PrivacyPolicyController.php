<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PrivacyPolicyController extends Controller
{
    public function PrivacyPolicy(){

        $data['page_title'] = 'Privacy Policy Page';
        return view('frontend.PrivacyPolicy',$data);
    }
}

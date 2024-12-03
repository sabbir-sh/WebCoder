<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TarmAndConditionsController extends Controller
{
    public function terms (){
        $data['page_title'] = 'Term Conditions Page';
        return view('frontend.terms', $data);
    }
}

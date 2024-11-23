<?php

namespace App\Http\Services;

class HomeService {
    public function homeSliderData() {
        $data['banner_title1'] = "Discover your true beauty";
        $data['banner_title2'] = "I love my skin";
        $data['banner_title3'] = "Glow and radient your skin";

        return $data;
    }


    public function companyData() {
        $data['company_name'] = "Bio-xin Cosmeceuticals";
        $data['company_address'] = "Cultural Center, DOHS, mirpur Dhaka";
        $data['company_mobile'] = "0132648721";

        return $data;
    }
}

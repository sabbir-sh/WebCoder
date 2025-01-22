<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Http\Services\HomeService;
use App\Models\Products;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $homeServiceData = new HomeService();
        $data = $homeServiceData->homeSliderData();
        $data['page_title'] = "Home Page ";

        return view('frontend.home', $data);
    }

    public function productsshow()
    {
        // Fetch all products from the database
        $products = Products::all();

        // Pass products to the homepage view
        return view('frontend.products.show', compact('products'));
    }

}

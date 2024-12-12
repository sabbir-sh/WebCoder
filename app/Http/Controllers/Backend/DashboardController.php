<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index() {
        $data['page_title'] = 'Dashboard';
        $data['data'] = Auth::user();
        return view('backend.dashboard', $data);
    }
}

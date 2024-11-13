<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Session;
class CustomAuthController extends Controller
{
    public function login(){
        return view( "auth.login");
    }

    public function register(){
        return view( "auth.register");
    }

    public function registerUser(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'number' => 'required|numeric',
            'password' => 'required|min:4|max:8'
        ]);
    $user = new User();
    $user->name = $request->name;
    $user->email = $request->email;
    $user->phone = $request->number;
    $user->password = Hash::make($request->password) ;
    $res = $user->save();
    if($res){
        return back()->with('success' , 'You have Register Successfuly');
    } else{
        return back()->with('fail', 'Something Worng');
    }
    }

    public function loginUser(Request $request)
    {
        $request->validate([
            'email' => 'required|email|exists:users',
            'password' => 'required'
        ]);

        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            // return redirect('dashboard');
            return redirect()->route('adminDashboard');
        } else{
            return back()->with('fail', 'Invalid email or password');
        }
    }

    public function dashboard()
    {
        $data['page_title'] = 'User Profile';
        $data['data'] = Auth::user();
        return view('dashboard', $data);
    }

    public function logout(Request $request){
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('login');
    }
}

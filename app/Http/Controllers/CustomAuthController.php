<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Session;
use Illuminate\Support\Facades\Mail;
use App\Mail\PasswordResetMail;
use Illuminate\Support\Facades\Password;

class CustomAuthController extends Controller
{
    public function login()
    {
        $data['page_title'] = "Login";
        return view("auth.login",$data);
    }

    public function register()
    {
        return view("auth.register");
    }

    public function registerUser(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'dob' => 'required|date|before:today',
            'email' => 'required|email|unique:users',
            'number' => 'required|numeric',
            'gender' => 'required|in:male,female,other',
            'bio' => 'nullable|string|max:500',
            'password' => 'required|min:4|max:8'
        ]);
        $user = new User();
        $user->name = $request->name;
        $user->dob = $request->input('dob');
        $user->email = $request->email;
        $user->phone = $request->number;
        $user->gender = $request->input('gender');
        $user->bio = $request->input('bio');
        $user->password = Hash::make($request->password);
        $res = $user->save();
        if ($res) {
            return redirect()->route('login')->with('success', 'You have registered successfully. Please log in!');
        } else {
            return back()->with('fail', 'Something went wrong. Please try again.');
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
        } else {
            return back()->with('fail', 'Invalid email or password');
        }
    }


    public function dashboard()
    {

        $data['page_title'] = 'User Profile';
        $data['data'] = Auth::user();
        return view('backend.dashboard', $data);
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route("login");
    }






    public function view($id)
    {
        // Find the user by ID
        $user = User::findOrFail($id);

        // Pass the user data to the 'user.edit' view
        return view('backend.user.view', compact('user'));
    }



   

    public function showForgotPasswordForm()
{
    return view('auth.forgot-password');
}

public function handleForgotPassword(Request $request)
{
    $request->validate([
        'email' => 'required|email|exists:users,email',
    ]);

    // Implement password reset logic (e.g., send reset email).
    return redirect('reset-password')->with('success', 'Password reset link sent to your email.');
}

public function showResetPasswordForm(Request $request)
{
    return view('auth.reset-password', ['token' => $request->query('token'), 'email' => $request->query('email')]);

}

public function resetPassword(Request $request)
{
    $request->validate([
        'token' => 'required',
        'email' => 'required|email',
        'password' => 'required|confirmed|min:6',
    ]);

    $status = Password::reset(
        $request->only('email', 'password', 'password_confirmation', 'token'),
        function ($user, $password) {
            $user->forceFill([
                'password' => Hash::make($password),
            ])->save();
        }
    );

    return $status === Password::PASSWORD_RESET
        ? redirect()->route('auth.login')->with('success', 'Password reset successfully.')
        : back()->with('fail', 'Failed to reset password.');
}

}

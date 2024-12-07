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
        return view("auth.login");
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

    public function userList()
    {
        $da['welcome'] = 'Welcome To User List Page';
        $da['title'] = 'All User Lists';
        $da['users'] = User::orderBy('id','desc')->get();
        return view('backend.user.userList', $da);
    }


    public function edit($id)
    {
        // Find the user by ID
        $user = User::findOrFail($id);
        return view('backend.user.edit', compact('user'));
    }

    public function view($id)
    {
        // Find the user by ID
        $user = User::findOrFail($id);

        // Pass the user data to the 'user.edit' view
        return view('backend.user.view', compact('user'));
    }

    public function update(Request $request, $id)
    {
        // Find the user by ID
        $user = User::findOrFail($id);

        // Validate the form input
        $request->validate([
            'name' => 'required|string|max:255',
            'dob' => 'required|date|before:today',
            'email' => 'required|email|unique:users,email,' . $id,
            // Add other validation rules as necessary
        ]);

        // Update the user with the validated data
        $user->update($request->only(['name', 'dob', 'email', 'phone', 'gender', 'bio']));

        // Redirect back with a success message
        return redirect()->route('listOfUser')->with('success', 'User updated successfully.');
    }

    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();
        return redirect()->route('listOfUser')->with('success', 'User deleted successfully');
    }

    public function create()
    {

        return view('backend.user.create');
    }

    public function store(Request $request)
    {
        // Validate the form data
        $request->validate([
            'name' => 'required',
            'dob' => 'required|date|before:today',
            'email' => 'required|email|unique:users',
            'number' => 'required|numeric',
            'gender' => 'required|in:male,female,other',
            'bio' => 'nullable|string|max:500',
            'password' => 'required|min:4|max:8'
        ]);

        // Create a new user with a hashed password
        User::create([
            'name' => $request->name,
            'dob' => $request->input('dob'), // Ensure it matches the column name in your database
            'email' => $request->email,
            'phone' => $request->input('number'), // Ensure it matches the column name in your database
            'gender' => $request->input('gender'),
            'bio' => $request->input('bio'),
            'password' => bcrypt($request->password), // Hash the password
        ]);
        // Redirect back with a success message
        return redirect()->route('listOfUser')->with('success', 'User created successfully!');
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

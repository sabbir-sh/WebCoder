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
    $user->password = Hash::make($request->password) ;
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

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('login');
    }
    public function userList()
    {

        $users = User::all();
        return view('userList', ['users' => $users]);
    }



    public function edit($id)
    {
        // Find the user by ID
        $user = User::findOrFail($id);

        // Return the edit view with the user data
        return view('users.edit', compact('user'));
    }

// app/Http/Controllers/CustomAuthController.php

public function update(Request $request, $id)
{
    // Find the user by ID
    $user = User::findOrFail($id);

    // Validate the incoming request data
    $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|email|max:255|unique:users,email,' . $id,  // Make sure email remains unique excluding current user
        'phone' => 'nullable|string|max:15',
    ]);

    // Update the user details
    $user->name = $request->input('name');
    $user->email = $request->input('email');
    $user->phone = $request->input('phone');
    $user->save(); // Save changes to the database

    // Redirect back to the user list with a success message
    return redirect()->route('listOfUser')->with('success', 'User updated successfully');
}


public function destroy($id)
{
    $user = User::findOrFail($id);
    $user->delete();
    return redirect()->route('listOfUser')->with('success', 'User deleted successfully');
}



}

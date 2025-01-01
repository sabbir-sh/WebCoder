<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Services\UserService;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function userList()
    {
        try {
            $service = new UserService();
            $response = $service->userList();

            if($response['success'] == true) {
                $da['welcome'] = 'Welcome To User List Page';
                $da['title'] = 'All User Lists';
                $da['users'] = $response['data'];
                return view('backend.user.userList', $da);
            } else {
                return redirect()->back()->with('dismiss', $response['message']);
            }
        } catch(\Exception $e) {
            return redirect()->back()->with('dismiss', 'Something went wrong');
        }
    }

    public function create()
    {
        return view('backend.user.create');
    }

    public function store(Request $request)
    {
        try {
            if (isset($request->edit_id)) {
                $request->validate([
                    'name' => 'required|string|max:255',
                    'dob' => 'required|date|before:today',
                    'email' => 'required|email|unique:users,email,' . $request->edit_id,
                    // Add other validation rules as necessary
                ]);
            } else {
                $request->validate([
                    'name' => 'required',
                    'dob' => 'required|date|before:today',
                    'email' => 'required|email|unique:users',
                    'number' => 'required|numeric',
                    'gender' => 'required|in:male,female,other',
                    'bio' => 'nullable|string|max:500',
                    'password' => 'required|min:4|max:8'
                ]);
            }

            $service = new UserService();
            $response = $service->userStore($request);
            if($response['success'] == true) {
                return redirect()->route('listOfUser')->with('success', $response['message']);
            } else {
                return redirect()->back()->with('dismiss', $response['message']);
            }

        } catch(\Exception $e) {
            // return redirect()->back()->with('dismiss', 'Something went wrong');
            return redirect()->back()->with('dismiss', $e->getMessage());
        }
    }

    public function edit($id)
    {
        // Find the user by ID
        $data['user'] = User::findOrFail($id);
        return view('backend.user.edit', $data);
    }

    public function update(Request $request, $id)
    {
        try {
            // Validate the form input
            $request->validate([
                'name' => 'required|string|max:255',
                'dob' => 'required|date|before:today',
                'email' => 'required|email|unique:users,email,' . $id,
                // Add other validation rules as necessary
            ]);

        } catch(\Exception $e) {
            return redirect()->back()->with('dismiss', 'Something went wrong');
        }
        $user = User::findOrFail($id);



        // Update the user with the validated data
        $user->update($request->only(['name', 'dob', 'email', 'phone', 'gender', 'bio','status']));

        // Redirect back with a success message
        return redirect()->route('listOfUser')->with('success', 'User updated successfully.');
    }

   public function destroy($id)
        {
            try {
                $user = User::findOrFail($id);
                $user->delete();

                return redirect()->route('listOfUser')->with('success', 'User deleted successfully.');
            } catch (\Exception $e) {
                return redirect()->route('listOfUser')->with('dismiss', 'Failed to delete user: ' . $e->getMessage());
            }
        }
}

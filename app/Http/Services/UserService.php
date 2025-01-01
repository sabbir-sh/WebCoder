<?php

namespace App\Http\Services;

use App\Models\User;

class UserService {
    public function userList() {
        $list = User::orderBy('id','desc')->get();
        if (isset($list[0])) {
            return ['success' => true, 'message' => 'Data get successfully', 'data' => $list];
        } else {
            return ['success' => false, 'message' => 'No user found', 'data' => []];
        }
    }

    // Create and Update
    public function userStore($request) {
        $input = [
            'name' => $request->name,
            'dob' => $request->input('dob'),
            'email' => $request->email,
            'phone' => $request->input('number'),
            'gender' => $request->input('gender'),
            'bio' => $request->input('bio'),
        ];
        if (isset($request->status)) {
            $input['status'] = $request->status;
        }

        if ($request->edit_id) {

            User::where('id', $request->edit_id)->update($input);
            return ['success' => true, 'message' => 'User updated successfully', 'data' => []];
        } else {

            $input['password'] = bcrypt($request->password);
            $data = User::create($input);
            if ($data) {
                return ['success' => true, 'message' => 'New user created successfully', 'data' => $data];
            } else {
                return ['success' => false, 'message' => 'User creation failed', 'data' => []];
            }
        }

    }
        public function destroy($id)
        {
            if (isset($list[0])) {
                    return ['success' => true, 'message' => 'Data delete successfully'];
              } else {
                   return ['success' => false, 'message' => 'No data found', 'data' => []];
           }
        }

}

// public function userList() {
//     $list = User::orderBy('id','desc')->get();
//     if (isset($list[0])) {
//         return ['success' => true, 'message' => 'Data get successfully', 'data' => $list];
//     } else {
//         return ['success' => false, 'message' => 'No user found', 'data' => []];
//     }
// }

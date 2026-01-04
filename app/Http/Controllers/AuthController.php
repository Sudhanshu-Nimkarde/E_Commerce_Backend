<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Genders;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    public function getGenders() 
    {
        $genders = Genders::all();

        if (!$genders) {

            return response()->json([
                'status' => false,
                'status_code' => 'EC-0002',
                'message' => 'Gender not found'
            ], 400);
        }

        return response()->json([
            'status' => true,
            'status_code' => 'EC-0003',
            'message' => 'Success',
            'data' => $genders,
        ], 200);   
    }

    public function storeUser(Request $request) 
    {
        $validator = Validator::make($request->all(),[
            'name'      => 'required',
            'email'     => 'required|email|unique:users,email',
            'contact'   => 'nullable|digits:10',
            'gender'    => 'required|in:Male,Female,Other',
            'user_name' => 'required|string',
            'address'   =>  'string',
            'password'  => 'required|min:6|same:confirm_password',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'status_code' => 'EC-0001',
                'errors' => $validator->errors(),
                'message' => 'Validation failed'
            ], 422);
        }

        $newUser = new User();
        $newUser->name = $request->name;
        $newUser->email = $request->email;
        $newUser->contact = $request->contact;
        $newUser->gender = $request->gender;
        $newUser->user_name = $request->user_name;
        $newUser->address = $request->address;
        $newUser->is_active = 1;
        $newUser->auth_token = $this->generateAuthToken();
        $newUser->password = Hash::make($request->password);

        if($newUser->save()) {
            return response()->json([
                'status' => true,
                'status_code' => 'EC-1111',
                'message' => 'User registered successfully'
            ], 200);
        }

        return response()->json([
            'status' => false,
            'status_code' => 'EC-0002',
            'message' => 'Failed to register user'
        ], 500);
    }

    public function loginUser(Request $request) 
    {
        $validator = Validator::make($request->all(), [
            'user_name' => 'required|string',
            'password' => 'required|string|min:6'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'status_code' => 'EC-0001',
                'errors' => $validator->errors(),
                'message' => 'Validation failed'
            ], 400);
        }

        $user = User::where('user_name', $request->user_name)
                    ->where('is_active', 1)
                    ->first();

        if (!$user) 
        {
            return response()->json([
                'status' => false,
                'status_code' => 'EC-0005',
                'message' => 'Invalid user name'
            ], 400);
        }

        if (!$user || !Hash::check($request->password, $user->password))
        {
            return response()->json([
                'status' => false,
                'status_code' => 'EC-0006',
                'message' => 'Invalid credentials'
            ], 400);
        }

        $authToken = $user->auth_token;

        if (!$authToken)
        {
            $user->auth_token = $this->generateAuthToken();
            $user->save();
        }

        $data = [
            'user_id'    => $user->id,
            'role_id'    => $user->role_id,
            'auth_token' => $user->auth_token,
            'name'       => $user->name,
            'email'      => $user->email,
            'user_name'  => $user->user_name,
            'contact'    => $user->contact,
            'gender'     => $user->gender
        ]; 

        return response()->json([
            'status' => true,
            'status_code' => 'EC-1112',
            'message' => 'Login successful',
            'data' => $data
        ]);

    }

    private function generateAuthToken()
    {
        return bin2hex(openssl_random_pseudo_bytes(16));
    }
}

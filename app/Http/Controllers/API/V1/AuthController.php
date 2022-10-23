<?php

namespace App\Http\Controllers\API\V1;

use App\Http\Controllers\Controller;
use App\Models\Admin\RoleUser;
use App\Models\User;
use App\Models\UserProfile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Str;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        // Validate
        $input = Validator::make($request->all(), [
            'email'     => 'required|email',
            'password'  => 'required|string'
        ]);

        // Error validate
        if($input->fails()) {
            return response()->json([
                'status' => 'error',
                'message' => $input->errors()
            ], 403);
        }

        // Check email
        $user = User::with(['desa', 'profile:id,user_id,image,telp,birth_day,address,bio'])
            ->whereEmail(str_replace(' ', '', $request['email']))
            ->first();

        if(empty($user)) {
            return response()->json([
                'status' => false,
                'message' => 'Email not registered'
            ], 404);
        }

        // Check Role
        $checkRole = RoleUser::whereModelId($user->id)->first();

        if($checkRole->role_id < 4) {
            return response()->json([
                'status' => false,
                'message' => 'Failed to login'
            ], 401);
        }

        // Check password
        if(!$user || !Hash::check($request['password'], $user->password)) {
            return response()->json([
                    'status' => false,
                    'message' => 'Incorrect email or password'
            ], 401);
        }

        // if (!$user->email_verified_at){
        //     return response()->json([
        //         'status' => false,
        //         'message' => 'Please Verify Your Email'
        //     ], 202);
        // }

        // Create token
        $token = $user->createToken('myapptoken')->plainTextToken;

        return response()->json([
            'status' => true,
            'message' => 'Data retrieved successfully',
            'data' => [
                'user'  => $user,
                'token' => $token
            ]
        ], 201);
    }

    public function register(Request $request)
    {
        // Validate
        $input = Validator::make($request->all(), [
            'name' => 'required',
            'phone' => 'required',
            'email'     => 'required|email|unique:users,email',
            'password' => 'required',
        ]);

        // Error validate
        if($input->fails()) {
            return response()->json([
                'status' => 'error',
                'message' => $input->errors()
            ], 403);
        }

        $data = [
            'name' => $request['name'],
            'location_id' => 0,
            'is_active' => 1,
            'is_member' => 0,
            'email' => $request['email'],
            'password' => Hash::make($request['password'])
        ];  

        try {
            $user = User::create($data);
            UserProfile::create(['user_id' => $user->id, 'telp' => $request['phone']]);
            $user->syncRoles(4);
        } catch (\Throwable $th) {
            return response()->json([
                'status' => false,
                'message' => 'error'
            ], 400);
        }

        return response()->json([
            'status' => true,
            'message' => 'success'
        ], 200);
    }

    public function changePassword(Request $request)
    {
        // Validate
        $input = Validator::make($request->all(), [
            'password' => 'required|min:8'
        ]);

        // Error validate
        if($input->fails()) {
            return response()->json([
                'status' => false,
                'message' => $input->errors()
            ], 403);
        }

        // Check user
        $user = User::find(Auth::user()->id);

        if(empty($user)) {
            return response()->json([
                'status' => false,
                'message' => 'data not found'
            ], 404);
        }

        $data = [
            'password' => Hash::make($request['password'])
        ];

        User::whereId($user->id)->update($data);

        return response()->json([
            'status' => true,
            'message' => 'success'
        ], 200);
    }

    public function forgotPassword(Request $request)
    {
        // Check user
        $user = User::whereEmail($request['email'])->first();

        if(empty($user)) {
            return response()->json([
                'status' => false,
                'message' => 'data not found'
            ], 404);
        }

        $data = [
            'token' => Str::random(32)
        ];

        \Mail::to($user->email)->send(new \App\Mail\ForgotPassword($data));

        User::whereId($user->id)->update($data);

        return response()->json([
            'status' => true,
            'message' => 'success'
        ], 200);
    }

    public function logout(Request $request)
    {
        auth()->user()->tokens()->delete();
        
        return response([
            'status' => true,
            'message' => 'success'
        ], 200);
    }
}

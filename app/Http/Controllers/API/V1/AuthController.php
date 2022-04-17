<?php

namespace App\Http\Controllers\API\V1;

use App\Http\Controllers\Controller;
use App\Models\Admin\RoleUser;
use App\Models\User;
use App\Models\UserProfile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        $input = $request->validate([
            'email'     => 'required|email',
            'password'  => 'required|string'
        ]);

        // Check email
        $user = User::with(['desa', 'profile:id,user_id,image,telp,birth_day,address,bio'])
            ->whereEmail(str_replace(' ', '', $input['email']))
            ->first();

        // Check Role
        $checkRole = RoleUser::whereModelId($user->id)->first();
        if($checkRole->role_id < 4) {
            return response()->json([
                'status' => false,
                'message' => 'Failed to login'
            ], 401);
        }

        // Check password
        if(!$user || !Hash::check($input['password'], $user->password)) {
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
        $input = $request->all();

        $this->validate($request, [
            'name' => 'required',
            'phone' => 'required',
            'email'     => 'required|email|unique:users,email',
            'password' => 'required',
        ]);

        $data = [
            'name' => $input['name'],
            'location_id' => 0,
            'is_active' => 1,
            'is_member' => 0,
            'email' => $input['email'],
            'password' => Hash::make($input['password'])
        ];  

        try {
            $user = User::create($data);
            UserProfile::create(['user_id' => $user->id, 'telp' => $input['phone']]);
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

    public function logout(Request $request)
    {
        auth()->user()->tokens()->delete();
        
        return response([
            'status' => true,
            'message' => 'success'
        ], 200);
    }
}

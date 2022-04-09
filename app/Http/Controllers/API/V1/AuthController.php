<?php

namespace App\Http\Controllers\API\V1;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        $fields = $request->validate([
            'email'     => 'required|string',
            'password'  => 'required|string'
        ]);

        // Check email
        $user = User::whereEmail($fields['email'])->first();

        // Check password
        if(!$user || !Hash::check($fields['password'], $user->password)) {
            return response()->json([
                    'status' => false,
                    'message' => 'Incorrect email or password'
            ], 202);
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
}

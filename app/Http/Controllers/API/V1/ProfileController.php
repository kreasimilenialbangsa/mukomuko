<?php

namespace App\Http\Controllers\API\V1;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\UserProfile;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function profile(Request $request)
    {
        $user_id = auth()->user()->id;
        
        $result = User::with(['desa', 'profile:id,user_id,image,telp,birth_day,address,bio'])
            ->whereId($user_id)
            ->first();

        return response([
            'status' => true,
            'message' => 'success',
            'data' => $result
        ], 200);
    }

    public function update(Request $request)
    {
        $user_id = auth()->user()->id;

        $data = [
            'name' => $request->name
        ];

        $profile = [
            'telp' => $request->phone,
            'birth_day' => $request->birth_day,
            'bio' => $request->bio,
            'address' => $request->address
        ];
        
        $user = User::whereId($user_id)->update($data);
        UserProfile::whereUserId($user_id)->update($profile);

        $result = User::with(['desa', 'profile:id,user_id,image,telp,birth_day,address,bio'])
            ->whereId($user_id)
            ->first();

        return response([
            'status' => true,
            'message' => 'success',
            'data' => $result
        ], 200);
    }
}

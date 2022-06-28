<?php

namespace App\Http\Controllers;

use App\Models\Admin\Desa;
use App\Models\User;
use App\Models\UserProfile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class RegisterController extends Controller
{
    public function index($type)
    {
        if($type != 'kecamatan' && $type != 'desa') {
            abort(404);
        }

        $typeAccount = $type == 'kecamatan' ? 0 : 1;

        $locations = Desa::when(($typeAccount == 0), function($q) {
            return $q->whereParentId(0);
        })->when(($typeAccount == 1), function($q) {
            return $q->where('parent_id', '>', 0);
        })->pluck('name', 'id');
        
        return view('pages.register.index')
            ->with('locations', $locations);
    }

    public function store(Request $request)
    {
        $request->validate([
            'location' => 'required',
            'name' => 'required',
            'email' => 'required',
            'telp' => 'required',
        ]);

        $email = preg_replace('/\s+/', '', strtolower($request->email)).'@lazisnumukomuko.id';

        $checkEmail = User::whereEmail($email)->first();

        if(!empty($checkEmail)) {
            Session::flash('error', 'Email sudah digunakan, silahkan gunakan email lain');
            return redirect()->route('register.index')->withInput();
        }

        $data = [
            'name' => $request->name,
            'location_id' => $request->location,
            'is_active' => 1,
            'is_member' => 1,
            'email' => $email,
            'password' => Hash::make('password')
        ];

        $member = User::create($data);

        if($member) {
            $member = User::find($member->id);
            $member->syncRoles($request->role);

            $profile = [
                'user_id' => $member->id,
                'nik' => $request->nik,
                'kk' => $request->kk,
                'telp' => '62'.ltrim($request->telp, 0),
                'birth_place' => $request->birth_place,
                'birth_day' => $request->birth_day,
                'address' => $request->address
            ];
            UserProfile::create($profile);
        }

        Session::flash('success', 'Akun anda berhasil didaftarkan');
        return redirect()->route('home');
    }
}

<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\UserProfile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use File;
use Str;

class ProfileController extends Controller
{
    public function index(Request $request)
    {
        $user = User::with('profile', 'role_user', 'desa')
            ->whereId(Auth::user()->id)
            ->firstOrFail();

        // dd($user->toArray() );

        return view('admin.pages.profiles.index')
            ->with('user', $user);
    }

    public function update(Request $request)
    {
        $userId = Auth::user()->id;

        $user = [
            'name' => $request->name
        ];

        $profile = [
            'telp' => $request->telp,
            'nik' => $request->nik,
            'kk' => $request->kk,
            'birth_day' => $request->birth_day,
            'birth_place' => $request->birth_place,
            'bio' => $request->bio,
            'address' => $request->address
        ];

        User::whereId($userId)->update($user);

        if(isset($request->image)) {
            if($request->hasFile('image')) {
                $request->validate([
                    'image' => 'mimes:jpeg,png|max:1014',
                ]);
    
                $file = $request->file('image');
                $fileName = Str::slug($request->name).'_'.uniqid() . '.' . $file->getClientOriginalExtension();
                Storage::put('public/admin/profile/'.$fileName, File::get($file));
    
                $profile['image'] = '/admin/profile/'.$fileName;
            } else {
                $profile['image'] = $request->image;
            }
        }

        UserProfile::whereUserId($userId)->update($profile);

        Session::flash('success', 'Data berhasil diubah');

        return redirect(route('admin.profile'));
    }
}

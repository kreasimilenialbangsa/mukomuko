<?php

namespace App\Http\Controllers;

use App\Models\Admin\Donate;
use App\Models\User;
use App\Models\UserProfile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class ProfileController extends Controller
{
    public function index(Request $request)
    {
        $user = User::with('profile')
            ->whereId(Auth::user()->id)
            ->whereIsActive(1)
            ->firstOrFail();

        return view('pages.profile.index')
            ->with('user', $user);
    }
    
    public function update(Request $request)
    {
        $user = [
            'name' => $request->name
        ];

        $profile = [
            'telp' => $request->phone_number,
            'birth_day' => $request->date_birth,
            'bio' => $request->bio,
            'address' => $request->address
        ];

        User::whereId($request->user_id)->update($user);

        UserProfile::whereUserId($request->user_id)->update($profile);

        Session::flash('success', 'Data berhasil diubah');

        return redirect(route('user.profile'));
    }

    public function history(Request $request)
    {
        $donates = Donate::select('id', 'type', 'type_id', 'name', 'email', 'phone', 'total_donate', 'is_confirm', 'created_at')
            ->with('program', 'ziswaf')
            // ->whereType('\App\Models\Admin\Ziswaf')
            ->whereUserId(Auth::user()->id)
            ->orderBy('id', 'desc')
            ->paginate(12);

        return view('pages.profile.history-transaction')
            ->with('donates', $donates);
    }

    public function inbox(Request $request)
    {
        return view('pages.profile.inbox');
    }

    public function notification(Request $request)
    {
        return view('pages.profile.notification');
    }

    public function show($id, Request $request)
    {
        return 'hello';
    }

    public function verification(Request $request)
    {
        return view('pages.profile.verification-member');
    }


}

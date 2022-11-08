<?php

namespace App\Http\Controllers;

use App\Models\Admin\Donate;
use App\Models\Admin\Notification;
use App\Models\User;
use App\Models\UserProfile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
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

    public function changePassword(Request $request)
    {
        return view('pages.profile.change-password');
    }

    public function processChangePassword(Request $request)
    {
        $request->validate([
            'password' => 'required|confirmed|min:8'
        ]);

        $data = [
            'password' => Hash::make($request->password)
        ];

        User::whereId(Auth::user()->id)->update($data);

        Session::flash('success', 'Password berhasil diubah');

        return redirect(route('user.changePassword'));
    }

    public function history(Request $request)
    {
        $donates = Donate::select('id', 'order_id', 'type', 'type_id', 'name', 'email', 'phone', 'total_donate', 'date_donate', 'is_confirm', 'created_at')
            ->with('program', 'ziswaf')
            // ->whereType('\App\Models\Admin\Ziswaf')
            ->whereEmail(Auth::user()->email)
            ->orWhere('user_id', Auth::user()->id)
            ->orderBy('date_donate', 'desc')
            ->paginate(5);

        return view('pages.profile.history-transaction')
            ->with('donates', $donates);
    }

    public function inbox(Request $request)
    {
        return view('pages.profile.inbox');
    }

    public function notification(Request $request)
    {
        $notifications = Notification::select('id', 'user_id', 'title', 'body', 'image', 'created_at')
            ->where('user_id', null)
            ->orderBy('created_at', 'desc')
            ->paginate(isset($request->limit) ? $request->limit : 10);

        return view('pages.profile.notification')
            ->with('notifications', $notifications);
    }

    public function show($id, Request $request)
    {
        $member = User::with('profile', 'desa', 'role_user')->whereId($id)->first();

        return view('pages.profile.verification-member')
            ->with('member', $member);
    }


}

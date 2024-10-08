<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Admin\RoleUser;
use App\Models\User;
use App\Models\UserProfile;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Str;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */
  
    use AuthenticatesUsers;
  
    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/';
   
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
   
    public function login(Request $request)
    {   
        $input = $request->all();
   
        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $user = User::with('profile')->whereEmail(str_replace(' ', '', $input['email']))->first();

        if(empty($user)) {
            Session::flash('error', 'Email atau Password salah!');
            return redirect()->route('home');
        }

        if($user->is_active == 0) {
            Session::flash('error', 'Akun Anda dinon-aktifkan');
            return redirect()->route('home');
        }

        $checkRole = RoleUser::whereModelId($user->id)->first();

        if($checkRole->role_id < 4) {
            Session::flash('error', 'Gagal Login');
            return redirect()->route('home');
        }
   
        if(auth()->attempt(array('email' => str_replace(' ', '', $input['email']), 'password' => $input['password'])))
        {
            session(['user' => [
                'id' => $user->id,
                'name' => $user->name,
                'email' => $user->email,
                'phone' => $user->profile->telp
            ]]);

            Session::flash('success', 'Anda berhasil login');
            return redirect()->route('home');
        }else{
            Session::flash('error', 'Email atau Password salah!');
            return redirect()->route('home');
        }

    }

    public function register(Request $request)
    {
        $input = $request->all();
   
        $this->validate($request, [
            'name' => 'required',
            'phone' => 'required',
            'email'     => 'required|email',
            'password' => 'required',
        ]);

        $checkEmail = User::whereEmail($input['email'])->first();
        if($checkEmail) {
            return response()->json([
                'status' => false,
                'message' => 'Email sudah dipakai, gunakan email lain!'
            ], 400);
        }

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
            $user->syncRoles(5);
        } catch (\Throwable $th) {
            return response()->json([
                'status' => false,
                'message' => 'error'
            ], 400);
        }


        return response()->json([
            'status' => true,
            'message' => 'Anda berhasil mendaftar'
        ], 200);
    }

    public function forgotPassword(Request $request)
    {
        return view('pages.auth.forgot-password');
    }

    public function postForgotPassword(Request $request)
    { 
        $request->validate([
            'email' => 'required'
        ]);
        
        $user = User::whereEmail($request->email)->first();

        if(empty($user)) {
            Session::flash('error', 'Email tidak ditemukan!');
            return redirect()->route('home');
        }
        
        $data = [
            'token' => Str::random(32)
        ];

        \Mail::to($user->email)->send(new \App\Mail\ForgotPassword($data));
        
        User::whereId($user->id)->update($data);
        
        Session::flash('success', 'Link atur ulang password sudah dikirim melalui email, silahkan periksa email Anda');
        return redirect()->route('home');
    }
    
    public function resetPassword(Request $request, $token)
    {
        $user = User::whereToken($token)->first();

        if(empty($user)) {
            Session::flash('error', 'Token tidak ditemukan!');
            return redirect()->route('home');
        }

        return view('pages.auth.reset-password')
            ->with('user', $user);
    }

    public function postResetPassword(Request $request, $token)
    {
        
        $request->validate([
            'password' => 'required|confirmed|min:8'
        ]);
        
        $user = User::whereToken($token)->first();

        if(empty($user)) {
            Session::flash('error', 'Token tidak ditemukan!');
            return redirect()->route('home');
        }
        
        $data = [
            'password' => Hash::make($request->password),
            'token' => null
        ];
        
        User::whereId($user->id)->update($data);
        
        Session::flash('success', 'Password berhasil diperbarui, silahkan login kembali');
        return redirect()->route('home');
    }
}

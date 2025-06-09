<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
  
    public function register()
    {
        return view('admin.auth.register');
    }

    public function postregister(RegisterRequest $request)
    {
        User::create([
            'name' => $request->get('name'),
            'email' => $request->get(key: 'email'),
            'password' => Hash::make($request->get(key: 'password')),
            'role' => 'User', // Mặc định
        ]);

        return back()->with('message', 'đăng kí thành công ');
    }

    //dang nhap
      public function login()
    {
        
        return view('admin.auth.login');
    }

    public function postlogin(LoginRequest $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->intended('/');
        }

        return back()->with('message', 'email hoac mat khau khong dung');
    }

    //logout
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerate();

        return redirect()->route('login');
    }
}

<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\User;
use Auth;
use Hash;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function __construct()
    {
    }
    public function showLoginForm()
    {
        if (Auth::id() > 0) {
            return redirect()->route('dashboard.index');
        }

        return view('backend.login'); // View này phải tồn tại
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate(); // tránh session hijacking

            if (Auth::user()->role === 'Admin') {
                return redirect('/dashboard')->with('success', 'Đăng nhập dashbot thành công!');
            } else {
                return redirect()->route('/login')->with('error', ' bạn k có quyền');
            }


        }
        return redirect()->route('/login')->with('error', 'Thông tin tài khoản không chính xác ');
    }
    //dang ky
    public function showRegisterForm()
    {
        return view('backend.register');

    }
    public function register(Request $request)
    {
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => 'User'

        ]);
        return redirect()->route('/login')->with('success', 'Đăng ký thành công!');
    }

    //thoat
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerate();
        return redirect()->route('/login')->with('success', 'Đăng xuất thành công');
    }
}
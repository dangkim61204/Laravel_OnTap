<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Auth;
use Illuminate\Http\Request;

class AuthController extends Controller
{
     public function __construct()
    {
    }
    public function index()
    {
 
        if (Auth::id() > 0) {
            return redirect()->route('dashboard.index');
        }


        return view('backend.auth.login');
    }
    public function login(Request $request){
         $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);
        if(Auth::attempt($credentials)){
            $request->session()->regenerate(); // tránh session hijacking
            return redirect('/')->with('success','dang nhap thanh conng');
        }
        return redirect()->with('error', 'Thông tin tài khoản không chính xác');
    }

    public function logout(Request $request){
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerate();
        return redirect('/login')->with('success', 'Đăng xuất thành công');
}
}
<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Middleware\AuthAdmin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class LoginController extends Controller
{
    public function index()
    {
        Auth::logout();
        return view('admin.login', [
            'title' => 'Đăng nhập'
        ]);

    }

    public function check(Request $request)
    {
        $this->validate($request, [
            'username' => 'required',//bắt buộc
            'password' => 'required'
        ]);
        if (Auth::attempt(
            [
            'username' => $request->input('username'),
            'password' => $request->input('password'),
        ]
        ))
        {
            return redirect()->route('admin_main');
        }
        Session::flash('error', 'Tài khoản hoặc mật khẩu không chính xác');
        return redirect()->back();
    }
}

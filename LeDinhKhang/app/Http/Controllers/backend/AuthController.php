<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    
    public function login()
    {
        if(Auth::check())
        {
            return redirect()->route('dashboard');
        }
        return view('backend.user.login');
    }
    public function dologin(Request $request)
    {
        if (filter_var($request->username, FILTER_VALIDATE_EMAIL))
        {
            $user['email'] = $request->username;
        }
        else
        {
            $user['name'] =$request->username;
        }
        $user['password'] = $request->password;
        if (Auth::attempt($user))
        {
            return redirect()->route('dashboard');
        }
        return back()->with([
            'message'=>'Tài khoản hoặc mật khẩu không đúng',
        ]);
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('admin.login');
    }


}

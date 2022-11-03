<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\RegisterRequest;
use App\Http\Requests\LoginRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;


class RegisterController extends Controller
{ 
    public function register()
    {
        if(Auth::check()){
            return redirect()->route('dashboard');
        }
        else{
            return view ("backend.user.register");
        }
    } 
    public function doRegister(RegisterRequest $request)
    {
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password =bcrypt($request->password);//mã hóa mật khẩu 
        $user->fullname   = $request->fullname; 
        $user->phone      = " "; 
        $user->address    = " "; 
        $user->gender     = "1"; 
        $user->roles      = "admin"; 
        $user->remember_token = "";
        $user->status     = 1;
        $user->created_by = 1;
        $user->save();
        if($user){
            return back()->with('success','Đăng ký thành công');
        }else{
            return back()->with('fail','Đăng ký thất bại');
        }
    } 
}

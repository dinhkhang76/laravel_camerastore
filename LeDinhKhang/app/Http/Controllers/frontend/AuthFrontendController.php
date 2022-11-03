<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class AuthFrontendController extends Controller
{
  
    public function dangnhap(){
        if(Auth::check()){
            return redirect()->route('site.home');
        }else
        return view('frontend.login');
    }
    public function doDangnhap(Request $request){
        if(filter_var($request->name, FILTER_VALIDATE_EMAIL)){
            $user['email'] = $request->name;
        }else{
            $user['name'] = $request->name; 
        } 
        $user['password'] = $request->password;
        if (Auth::attempt($user)){
            return redirect()->route('site.home');
        }else{
            return redirect()->route('login.index')->with('message',['typemsg'=>'danger','msg'=>'Tên đăng nhập hoặc mật khẩu không đúng']);
        }
    }
    public function dangxuat(){
        Auth::logout();
        return redirect()->route('site.home');
    }
}
<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Http\Requests\DangKyRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;


class DangKyController extends Controller
{
    public function dangky(){
        return view('frontend.register');
    }
    public function doDangky(DangKyRequest $request){
        $user = new User();
        $user->name       = $request->name;
        $user->email      = $request->email;
        $user->password   = bcrypt($request->password);//mã hóa mật khẩu 
        $user->fullname   = $request->fullname; 
        $user->phone      = $request->phone; 
        $user->address    = $request->address; 
        $user->gender     = $request->gender; 
        $user->roles      = "customer"; 
        $user->remember_token = "";
        $user->status     = 1;
        $user->created_by = 1;
        $user->save();
        if($user){
            return redirect()->route('register.index')->with('message',['typemsg'=>'success','msg'=>'Đăng ký thành công']);//chuyển hướng website
        }else{
            return redirect()->route('register.index')->with('message',['typemsg'=>'danger','msg'=>'Đăng ký thất bại']);//chuyển hướng trang
        }
    }
   
}
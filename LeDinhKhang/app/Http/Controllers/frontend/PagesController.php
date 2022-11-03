<?php

namespace App\Http\Controllers\Client;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
class PagesController extends Controller
{
    public function getRg(){
        return view('pages.register');
    }
    public function postRg(Request $request){
        $this->validate($request,
            [
                'email'=>'required|email|',
                'password'=>'required|min:6|max:20',
                'fullname'=>'required',
                'password_con'=>'required|same:password'

            ],

            [
                'email.required'=>'vui longf nhap email',
                'email.email'=>'khong dung dinh dang email',
                'password.required'=>'vui long nhap password',
                'password_con.same'=>'mat khau khong giong nhau',
                'password.min'=>'it nhat 6 ki tu'
        ]);
        $user = new User();
        $user->fullname=$request->fullname;
        $user->email=$request->email;
        $user->password= Hash::make($request->password);
        $user->username=$request->username;
        $user->phone=$request->phone;
        $user->gender=$request->gender;
        $user->save();
        return redirect()->back()->with('thanhcong','tao tai khoan thanh cong');

    }
    public function getLogin(){
        return view('pages.customer-login');
    }
    public function postLogin(Request $request){
        $this->validate($request,
        [
            'email'=>'required|email|',
            'password'=>'required|min:6|max:20',
           

        ],

        [
            'email.required'=>'vui longf nhap email',
            'email.email'=>'khong dung dinh dang email',
            'password.required'=>'vui long nhap password',
            'password_con.same'=>'mat khau khong giong nhau',
            'password.min'=>'it nhat 6 ki tu',
            'password.max'=>'khong qua 20 ki tu'
    ]);
    $ct = array('email'=>$request->email,
    'password'=>$request->password
        );
        if(Auth::attempt($ct)){
            return redirect('/');
        }
        else{
            return redirect()->back();
        }
    }
    public function logout(Request $req){
        Auth::logout();
        $req->session()->flush();
        return redirect()->back();
    }
    
}

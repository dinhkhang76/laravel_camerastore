<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\CustomerStoreRequest;
use App\Http\Requests\CustomerUpdateRequest;
use App\Models\User;//lấy trong Models\User


class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $list = User::where([['roles','=','customer'],['status','!=','0']])->get();
        return view('backend.customer.index',compact('list'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $list_customer = User::where('status', '!=' , 0)->orderBy('created_at','desc')->get();
        return view('backend.customer.create',compact('list_customer'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CustomerStoreRequest $request)
    {
        $user             = new User();
        $user->name       = $request->name; 
        $user->email      = $request->email;
        $user->password   = bcrypt($request->password);//mã hóa mật khẩu 
        $user->fullname   = $request->fullname; 
        $user->phone      = $request->phone; 
        $user->address    = ""; 
        $user->gender     = $request->gender; 
        $user->roles      = "customer"; 
        $user->status     = $request->status;
        $user->created_by = 1; 
        $user->save();
        return redirect()->route('customer.index')->with('message',['typemsg'=>'success','msg'=>'Thêm thành công']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::find($id);
        return view('backend.customer.show',compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::find($id);
        $list_customer = User::where('status', '!=' , 0)->orderBy('created_at','desc')->get();
        return view('backend.customer.edit',compact('list_customer','user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CustomerUpdateRequest $request, $id)
    {
            $user             = User::find($id);
            $user->name       = $request->name; 
            $user->email      = $request->email;
            $user->password   = bcrypt($request->password);//mã hóa mật khẩu 
            $user->fullname   = $request->fullname; 
            $user->phone      = $request->phone; 
            $user->address    = $request->address; 
            $user->gender     = $request->gender; 
            $user->roles      = "customer"; 
            $user->status     = $request->status;
            $user->updated_by = 1; 
            $user->save();
            return redirect()->route('customer.index')->with('message',['typemsg'=>'success','msg'=>'Cập nhật thành công']);//chuyển hướng website

    }

    /**
     * DELETE: admin/category
     * xóa khỏi thùng rác vĩnh viễn
    */
    public function destroy($id)
    {
        $user = User::find($id);
        if($user==null)
        {
            return redirect()->route('customer-trash')->with('message',['typemsg'=>'danger','msg'=>'Mẫu tin không tồn tại']);//chuyển hướng trang
 
        }
        $user->delete();//xóa
        return redirect()->route('customer-trash')->with('message',['typemsg'=>'success','msg'=>'Xóa thành công']);//chuyển hướng website

    }
    /**
     * GET: admin/category-trash
     * thùng rác chứa danh mục đã bị xóa
    */
    public function trash()
    {
        $list = User::where([['roles','=','customer'],['status','=',0]])->orderBy('created_at','desc')->get();
        return view('backend.customer.trash',compact('list'));

    }
    /**
     * GET: admin/category/1/status
     * trạng thái, bật tắt danh mục 
    */
    public function status($id)
    {
        //lấy ra chi tiết mẫu tin
        $user = User::find($id);
        if($user==null)
        {
            return redirect()->route('customer.index')->with('message',['typemsg'=>'danger','msg'=>'Mẫu tin không tồn tại']);;//chuyển hướng trang
 
        }
        $user->status = ($user->status==2)?1:2;
        $user->save();//lưu
        return redirect()->route('customer.index')->with('message',['typemsg'=>'success','msg'=>'Thay đổi thành công']);//chuyển hướng trang
    }
    /**
     * GET: admin/category/1/deltrash
     * xóa vào trong thùng rác
    */
    public function deltrash($id)
    {
        $user = User::find($id);
        if($user==null)
        {
            return redirect()->route('customer.index')->with('message',['typemsg'=>'danger','msg'=>'Mẫu tin không tồn tại']);//chuyển hướng trang
        }
        $user->status = 0;
        $user->save();//lưu
        return redirect()->route('customer.index')->with('message',['typemsg'=>'success','msg'=>'Xóa vào thùng rác thành công']);//chuyển hướng trang
    }

    /**
     * GET: admin/category/1/retrash
     * khôi phục 
    */
    public function retrash($id)
    {
        $user = User::find($id);
        if($user==null)
        {
            return redirect()->route('customer-trash')->with('message',['typemsg'=>'danger','msg'=>'Mẫu tin không tồn tại']);//chuyển hướng trang
 
        }
        $user->status = 2;
        $user->save();//lưu
        return redirect()->route('customer-trash')->with('message',['typemsg'=>'success','msg'=>'Khôi phục thành công']);//chuyển hướng trang
    }
}
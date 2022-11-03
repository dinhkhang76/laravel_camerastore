<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Contact;

class ContactController extends Controller
{
    /* GET:admin/customer 
    */
    public function index()
    {
        $list=Contact::where('status','!=',0  )->orderBy('created_at','desc')->get();
        return view('backend.customer.index',compact('list'));
    }


   
    /* GET:admin/customer/1 
    */
    public function show($id)
    {
        $customer=Contact::find($id);
        return view('backend.customer.show',compact('customer'));

    } 

    /* GET:admin/customer/1/edit 
    */
    public function edit($id)
    {
        $customer=Contact::find($id);
        $list_customer=customer::where('status','!=',0)->orderBy('created_at','desc')->get();
        return view('backend.customer.edit',compact('list_customer','customer'));
    }


    
    /* DELETE:admin/customer 
    */
    public function destroy($id)
    {
        $customer=Contact::find($id);
        if($customer==null)
        {
            return redirect()->route('customer-trash')->with('message',['typemsg'=>'danger','msg'=>'Mẫu tin không tồn tại']);
        }
        $customer->delete();
        return redirect()->route('customer-trash')->with('message',['typemsg'=>'success','msg'=>'Xóa thành công']);

    }


    /* GET:admin/customer-trash 
    */
    public function trash()
    {
        $list=Contact::where('status','==',0  )->orderBy('created_at','desc')->get();
        return view('backend.customer.trash',compact('list'));
    }

    
    /* GET:admin/customer/1/status 
    */
    public function status($id)
    {
        //
        $customer= Contact::find($id);
        if($customer==null)
        {
            return redirect()->route('customer.index')->with('message',['typemsg'=>'danger','msg'=>'Mẫu tin không tồn tại']);
        }
        $customer->status=($customer->status==2)?1:2;
        $customer->save();
        return redirect()->route('customer.index')->with('message',['typemsg'=>'success','msg'=>'Thay đổi trạng thái thành công']);

    }
    /* GET:admin/customer/1/deltrash 
    */
    public function deltrash($id)
    {
        $customer= Contact::find($id);
        if($customer==null)
        {
            return redirect()->route('customer.index')->with('message',['typemsg'=>'success','msg'=>'Mẫu tin không tồn tại']);
        }
        $customer->status=0;
        $customer->save();
        return redirect()->route('customer.index')->with('message',['typemsg'=>'success','msg'=>'Xóa thành công']);
    }

    /* GET:admin/customer/1/retrash 
    */
    public function retrash($id)
    {
        $customer= Contact::find($id);
        if($customer==null)
        {
            return redirect()->route('customer-trash')->with('message',['typemsg'=>'success','msg'=>'Mẫu tin không tồn tại']);
        }
        $customer->status=2;
        $customer->save();
        return redirect()->route('customer-trash')->with('message',['typemsg'=>'success','msg'=>'Khôi phục thành công']);
    }
}

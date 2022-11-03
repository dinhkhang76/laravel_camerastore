<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $list= Order::
        join('orderdetails', 'orderdetails.orderid','=','orders.id')
        ->join('users', 'users.id','=','orders.userid')
        ->orderBy('orders.created_at','desc')
        ->get();
        return view('backend.order.index',compact('list'));
    }

    

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $order=Order::find($id);
        return view('backend.order.show',compact('order'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $order=Order::find($id);
        return view('backend.order.edit',compact('order'));


    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $order=Order::find($id);
        if($order==null)
        {
            return redirect()->route('order-trash')->with('message',['typemsg'=>'danger','msg'=>'Mẫu tin không tồn tại']);
        }
        $product->delete();
        return redirect()->route('order-trash')->with('message',['typemsg'=>'success','msg'=>'Xóa thành công']);

    }
      /* GET:admin/product-trash 
    */
    public function trash()
    {
        $order=Order::where('status','==',0  )->orderBy('created_at','desc')->get();
        return view('backend.order.trash',compact('order'));

    }
    /* GET:admin/product/1/deltrash 
    */
    public function deltrash($id)
    {
        $order= Order::find($id);
        if($order==null)
        {
            return redirect()->route('order.index')->with('message',['typemsg'=>'success','msg'=>'Mẫu tin không tồn tại']);
        }
        $order->status=0;
        $order->save();
        return redirect()->route('order.index')->with('message',['typemsg'=>'success','msg'=>'Xóa thành công']);
    }

    /* GET:admin/product/1/retrash 
    */
    public function retrash($id)
    {
        $order= Order::find($id);
        if($order==null)
        {
            return redirect()->route('order-trash')->with('message',['typemsg'=>'success','msg'=>'Mẫu tin không tồn tại']);
        }
        $order->status=2;
        $order->save();
        return redirect()->route('product-trash')->with('message',['typemsg'=>'success','msg'=>'Khôi phục thành công']);
    }
}

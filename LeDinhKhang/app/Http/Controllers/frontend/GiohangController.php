<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Http\Requests\CheckPayRequest;
use App\Models\Order;
use App\Models\Orderdetail;
use Illuminate\Support\Facades\Auth;



class GiohangController extends Controller
{
    public function index()
    {
        $list_cart =\Cart::getContent();
        return view('frontend.cart-index',compact('list_cart'));
    }
    public function addcart($id)
    {
        $product = Product::find($id);
        $cartitem =array(
            'id' => $id,
            'name' => $product->name,
            'price' => $product->pricesale,
            'quantity' => 1,
            'attributes' => array('img'=>$product->img)
        );
        \Cart::add($cartitem);
        return redirect()->route('giohang.index');
    }

    public function delcart($id = null)
    {
        if($id != null)
        {
            \Cart::remove($id);
        }
        else
        {
            \Cart::clear();
        }
    
        return redirect()->route('giohang.index');
    }
    public function updatecart(Request $request)
    {
        $list_quantity = $request->quantity;
        $list_cart = \Cart::getContent();
        $i=0;
        foreach($list_cart as $row_cart)
        {
            \Cart::update($row_cart->id,array(
                'quantity'=> array('relative' => false, 'value' => $list_quantity[$i])
            ));
            $i++;
        }
        return redirect()->route('giohang.index');
    }

    public function paycart()
    {
        if(Auth::check()){
            $list_cart = \Cart::getContent();
            return view('frontend.pay', compact('list_cart'));
        }else
        return redirect()->route('login.index')->with('message',['typemsg'=>'danger','msg'=>'Vui lòng đăng nhập trước']);
        
    }
    public function payorder(CheckPayRequest $request)
    {
        $tongtien = \Cart::getTotal();
        $list_cart = \Cart::getContent();
        $order = new Order();
        $order->userid = Auth::user()->id;
        $order->fullname = $request->fullname;
        $order->phone = $request->phone;
        $order->email = $request->email;
        $order->address = $request->address;
        $order->note = $request->note;
        $order->save();
        foreach($list_cart as $row_cart){
            $orderdetail = new Orderdetail();
            $orderdetail->orderid = $order->id;
            $orderdetail->productid = $row_cart->id;
            $orderdetail->price = $row_cart->price;
            $orderdetail->number = $row_cart->quantity;
            $orderdetail->amount = $tongtien;
            $orderdetail->save();
        }
        \Cart::clear();
        return redirect()->route('pay-success.index');
    }
    public function paysuccess()
    {
        return view('frontend.pay-success');
    }
    
    
    
}

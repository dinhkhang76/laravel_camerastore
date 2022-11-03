@extends('layouts.site')
@section('title','Thanh Toán')
@section('maincontent')

<form action="{{ route('pay.order') }}" method="GET" name="form1" enctype="multipart/form-data">
    @csrf
    @includeIf('backend.message')

<div class="container my-3">      
    <h1 class="text-center" style="font-weight: bold;color:red;">ĐẶT HÀNG</h1><br><hr><br>

    <h3 class="text-center" style="font-weight: bold;font-size:35px">THÔNG TIN KHÁCH HÀNG</h3>
    <div class="row">
        <div class="col-md-12">
            <label style="font-weight:bold;" for="kh_ten">Họ tên</label>
            <input type="text" class="form-control" name="fullname" id="fullname"
                value="">
        </div>  
    </div>
    <div class="row">
        <div class="col-md-12">
            <label style="font-weight:bold;" for="kh_ten">Số điện thoại</label>
            <input type="text" class="form-control" name="phone" id="phone"
                value="">
        </div>  
    </div>
    <div class="row">
        <div class="col-md-12">
            <label  style="font-weight:bold;" for="kh_ten">Email</label>
            <input type="text" class="form-control" name="email" id="email"
                value="" >
        </div>  
    </div>
    <div class="row">
        <div class="col-md-12">
            <label  style="font-weight:bold;" for="kh_ten">Địa chỉ</label>
            <input type="text" class="form-control" name="address" id="address"
                value="" >
        </div>  
    </div>
    <div class="row">
        <div class="col-md-12">
            <label style="font-weight:bold;" for="kh_ten">Ghi chú</label>
            @if($errors->has('note'))
        <span class="text-danger">{{$errors->first('note')}}</span>
      @endif
            <input type="text" class="form-control" name="note" id="note"
                value="" >
        </div>  
    </div><br>

{{--     <h1 class="title"> Bạn đã có tài khoản? <a href="{{ route('login.index') }}">Đăng nhập</a></h1>
    <p>Thông tin người đặt hàng: <span>{{ Auth::user()->fullname }}</span></p>
    <p>Số điện thoại: <span>{{ Auth::user()->phone }}</span></p>
    <p>Email: <span>{{ Auth::user()->email }}</span></p>
    <p>Địa chỉ: <span>{{ Auth::user()->address }}</span></p>
    <p>Giới tính: <span>{{ Auth::user()->gender }}</span></p>
    <div class="row">
      <form action="{{ route('pay.order') }}" method="GET" name="form1" enctype="multipart/form-data">
        @if($errors->has('fullname'))
          <span class="text-danger">{{$errors->first('fullname')}}</span>
        @endif
        <input type="text" placeholder="Họ và tên" class="box" name="fullname">
        @if($errors->has('phone'))
          <span class="text-danger">{{$errors->first('phone')}}</span>
        @endif
        <input type="text" placeholder="Số điện thoại" class="box" name="phone">
        @if($errors->has('email'))
          <span class="text-danger">{{$errors->first('email')}}</span>
        @endif
        <input type="email" placeholder="Email" class="box" name="email">
        @if($errors->has('address'))
          <span class="text-danger">{{$errors->first('address')}}</span>
        @endif
        <input type="text" placeholder="Địa chỉ" class="box" name="address">
        @if($errors->has('note'))
          <span class="text-danger">{{$errors->first('note')}}</span>
        @endif
        <textarea id="" placeholder="Ghi chú"  cols="30" rows="10" name="note"></textarea>
 --}}


    
    <?php if(count($list_cart)>0):?>
    <table class="table table-bordered">
        <thead class="bg-info">
            <tr class="text-center">
                <th>ID</th>
                <th>Hình ảnh</th>
                <th>Tên sản phẩm</th>
                <th>Số lượng</th>
                <th>Giá</th>
                <th>Thành tiền</th>
            </tr>
        </thead>
        <tbody>
            
            <?php foreach($list_cart as $row_cart):?>
            <?php $attribute =$row_cart->attributes; ?>
            <tr class="text-center">
                <td  class="text-center">{{ $row_cart->id }}</td>
                <td style="width: 180px;">
                    <img class="img-fluid card-img-top bg" src="{{ asset('images/products/' .$attribute['img']) }}" alt="#">
                </td>
                <td style="font-weight: bold">{{ $row_cart->name }}</td>
                <td>
                    {{ $row_cart->quantity }}
                </td>
                <td class="text-end">{{ number_format($row_cart->price) }}<sup class="text-dark">đ</sup></td>
                <td class="text-end">{{ number_format($row_cart->quantity * $row_cart->price) }}<sup class="text-dark">đ</sup></td>
                
            </tr>
            <?php endforeach;?>
        </tbody>
                <tr class="text-center">
                   {{--  <th colspan="4">
                        <a href="{{ route('site.product.index') }}" class="btn btn-success btn-sm"> Mua thêm</a>
                        <input class="btn btn-info btn-sm" type="submit" value="Cập nhật">
                        <a href="{{ route('giohang.delcartall') }}" class="btn btn-danger btn-sm"> Xóa giỏ hàng</a>
                    </th> --}}
                    <th colspan="7" style="font-weight: bold;font-size:20px">
                        <?php 
                        $tong1 = \Cart::getTotal();
                        ?>
                        Tổng cộng: <b style="font-size: 22px;color:red">{{ number_format($tong1) }}</b><sup style="font-weight: bold;color:red">đ</sup>
                    </th>
                    
                </tr>
                
    </table>
<button type="submit" class="btn btn-warning btn-sm text-center text-uppercase" style="font-size: 22px;margin-left:45%;font-weight:bold;width:200px;">Đặt hàng</button><br>
<br><hr style="background-color: rgba(0, 0, 0, 0.959);height:3px;" > 

<a href="{{ route('site.home') }}" class="btn btn-info"><i class="fas fa-reply"></i>Tiếp tục mua hàng</a>
<a href="{{ route('giohang.index') }}" class="btn btn-success"><i class="fas fa-reply"></i>Về giỏ hàng</a>

</tr>
    <?php else:?>
    <img class="img-fluid card-img-top bg" src="{{ asset('images/products/null.jpeg') }}" alt="#" style="width: 30%;height:40%;margin-left:35%">
    <h2 class="text-center text-uppercase" style="color: red;font-weight:bold">Chưa có sản phẩm trong giỏ hàng !!</h2><br>
    <h4 class="text-center"><a class="text-center text-uppercase" style="text-decoration: none" href="{{ route('site.product.index') }}">Mua ngay</a></h4><br>
    <?php endif;?>
</div>
</form>




@endsection
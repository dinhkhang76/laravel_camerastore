@extends('layouts.site')
@section('title','Giỏ hàng')    
@section('maincontent')
    <form action="{{ route('giohang.updatecart') }}" method="POST" name="form1">
        @csrf
    <div class="container my-3">
        <h1 class="text-center">GIỎ HÀNG</h1><br><hr><br>
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
                    <th>Chức năng</th>
                </tr>
            </thead>
            <tbody>
                
                <?php foreach($list_cart as $row_cart):?>
                <?php $attribute =$row_cart->attributes; ?>
                <tr class="text-center">
                    <td  class="text-center">{{ $row_cart->id }}</td>
                    <td style="width: 150px;">
                        <img class="img-fluid card-img-top bg" src="{{ asset('images/products/' .$attribute['img']) }}" alt="#">
                    </td>
                    <td style="font-weight: bold">{{ $row_cart->name }}</td>
                    <td>
                        <input name="quantity[]" value="{{ $row_cart->quantity }}" min="1" type="number">
                    </td>
                    <td class="text-end">{{ number_format($row_cart->price) }}<sup class="text-dark">đ</sup></td>
                    <td class="text-end">{{ number_format($row_cart->quantity * $row_cart->price) }}<sup class="text-dark">đ</sup></td>
                    <td>
                        <a href="{{ route('giohang.delcart',['id' =>$row_cart->id]) }}" class="text-danger"><i class="fas fa-times"></i></a>
                    </td>
                </tr>
                <?php endforeach;?>
            </tbody>
                    <tr class="text-center">
                        <th colspan="4">
                            <a href="{{ route('site.product.index') }}" class="btn btn-success btn-sm"> Mua thêm</a>
                            <input class="btn btn-info btn-sm" type="submit" value="Cập nhật">
                            <a href="{{ route('giohang.delcartall') }}" class="btn btn-danger btn-sm"> Xóa giỏ hàng</a>
                        </th>
                        <th colspan="3">
                            <?php 
                            $tong1 = \Cart::getTotal();
                            ?>
                            Tổng cộng: {{ number_format($tong1) }}<sup>đ</sup>
                        </th>
                        
                    </tr>
                    
        </table>
        <tr> <a href="{{ route('pay.index') }}" class="btn btn-warning btn-sm text-center text-uppercase" style="font-size: 20px;margin-left:45%;font-weight:bold;">Thanh toán</a>
        </tr>
        <?php else:?>
        <img class="img-fluid card-img-top bg" src="{{ asset('images/products/null.jpeg') }}" alt="#" style="width: 30%;height:40%;margin-left:35%">
        <h2 class=" test1 text-center text-uppercase" style="color: red;font-weight:bold">Chưa có sản phẩm trong giỏ hàng !</h2><br>
        <h4 class="text-center"><a class="text-center text-uppercase" style="text-decoration: none" href="{{ route('site.product.index') }}">Mua ngay</a></h4><br>
        <?php endif;?>
    </div>
</form>
@endsection
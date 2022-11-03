@extends('layouts.admin')
@section('title','Chi tiết đơn hàng ')
@section('maincontent')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    

    <!-- Main content -->
    <section class="content my-2">

      <!-- Default box -->
      <div class="card">
        <div class="card-header">
            <div class="row">
                <div class="col-md-6">
                    <strong class="text-danger">CHI TIẾT ĐƠN HÀNG</strong>
                </div>
                <div class="col-md-6 text-right">
                    <a href="{{route('order.index')}}" class="btn btn-sm btn-info"><i class="fas fa-arrow-left"></i> Về danh sách</a> 
                </div>

            </div>
          

            
        </div>
        <div class="card-body">
            <table class="table table-bordered">
                <tr>
                    <th>Tên trường</th>
                    <th>Giá trị</th>
                </tr>
                <tr>
                    <td>Họ tên</td>
                    <td>{{ $order->fullname }}</td>
                </tr>
                <tr>
                    <td>Email</td>
                    <td>{{ $order->email }}</td>
                </tr>
                <tr>
                    <td>Số điện thoại</td>
                    <td>{{ $order->phone }}</td>
                </tr>
                <tr>
                    <td>Địa chỉ</td>
                    <td>{{ $order->address }}</td>
                </tr><tr>
                    <td>Mã đơn hàng</td>
                    <td>{{ $order->orderid }}</td>
                </tr><tr>
                    <td>Mã sản phẩm</td>
                    <td>{{ $order->productid }}</td>
                </tr><tr>
                    <td>Thành tiền</td>
                    <td>{{ $order->amount }}</td>
                
            </table>
        </div>
        <!-- /.card-body -->
        
      </div>
      <!-- /.card -->

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->


@endsection
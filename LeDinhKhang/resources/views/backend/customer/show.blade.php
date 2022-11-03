@extends('layouts.admin')
@section('title','Chi tiết khách hàng')
@section('maincontent')
    <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Main content -->
    <section class="content my-2" >

      <!-- Default box -->
      <div class="card">
        <div class="card-header">
            <div class="row">
                <div class="col-md-6">  
                    <strong class="text-danger">CHI TIẾT KHÁCH HÀNG</strong>
                </div>
                <div class="col-md-6 text-right"> <a href="{{ route('customer.index') }}" class="btn btn-sm btn-info"><i class="fas fa-arrow-left"></i> Về danh sách</a>  
                </div>
            </div>
        </div>
        <div class="card-body">
           <table class="table table-bordered text-dark">
               <tr class="bg-info text-center">
                   <th>Tên trường</th>
                   <th>Giá trị</th>
               </tr>
                <tr class="text-center">
                    <td>ID</td>
                    <td>{{$user->id}}</td>
                </tr>
                <tr class="text-center">
                    <td>Họ tên khách hàng</td>
                    <td>{{$user->fullname}}</th>
                </tr>
                <tr class="text-center">
                    <td>Tên đăng nhập</td>
                    <td>{{$user->name}}</td>
                </tr>
                <tr class="text-center">
                  <td>Email</td>
                  <td>{{$user->email}}</td>
                </tr>
                <tr class="text-center">
                  <td>Số điện thoại</td>
                  <td>{{$user->phone}}</td>
                </tr>
                <tr class="text-center">
                  <td>Địa chỉ</td>
                  <td>{{$user->address}}</td>
                </tr>
                <tr class="text-center">
                  <td>Giới tính</td>
                  <td>{{$user->gender}}</td>
                </tr>
                <tr class="text-center">
                  <td>Role</td>
                  <td>{{$user->roles}}</td>
                </tr>
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
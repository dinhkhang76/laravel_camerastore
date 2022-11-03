@extends('layouts.admin')
@section('title','Thêm khách hàng')
@section('maincontent')

<form name="form1" action="{{ route('customer.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
 <div class="content-wrapper">
     <div class="content-header">
         <div class="container-fluid">
             <div class="row mb-2">
                 <div class="col-sm-6">
                     <h1 class="m-0 font-weight-bold text-danger">THÊM KHÁCH HÀNG</h1>
                 </div>            
                 <div class="col-sm-6 text-right">
                     <button class="btn btn-sm btn-success" type="submit"><i class="fas fa-save"></i> Lưu(Thêm)</button>
                     <a href="{{route('customer.index')}}" class="btn btn-sm btn-info"><i class="fas fa-arrow-left"></i> Về danh sách</a>
                 </div>
             </div>
         </div>
     </div> 
         {{-- content header --}}
         
         {{-- Main content --}}
         <section class="content">
             <div class="container-fluid p-3">
                 <div class="row">
                     <div class="col-md-6">
                         <div class="form-group">
                             <label for="name">Tên đăng nhập</label>
                             <input name="name" value="{{ old('name') }}" type="text" class="form-control" id="name" placeholder="Nhập tên đăng nhập">
                             @if($errors->has('name'))
                             <span class="text-danger">{{$errors->first('name')}}</span>
                             @endif
                         </div>

                         <div class="form-group">
                            <label for="name">Email</label>
                            <input name="name" value="{{ old('email') }}" type="text" class="form-control" id="name" placeholder="Nhập Email">
                            @if($errors->has('email'))
                            <span class="text-danger">{{$errors->first('email')}}</span>
                            @endif
                        </div>

                        <div class="form-group">
                            <label for="password">Mật khẩu</label>
                            <input name="password" value="{{ old('password') }}" type="password" class="form-control" id="password" placeholder="Nhập mật khẩu">
                            @if($errors->has('password'))
                            <span class="text-danger">{{$errors->first('password')}}</span>
                            @endif
                        </div>

                        <div class="form-group">
                            <label for="password_re">Xác nhận mật khẩu</label>
                            <input name="password_re" value="{{ old('password_re') }}" type="password" class="form-control" id="password_re" placeholder="Xác nhận mật khẩu">
                            @if($errors->has('password_re'))
                            <span class="text-danger">{{$errors->first('password_re')}}</span>
                            @endif
                        </div>

                         
                     </div>
                     <div class="col-md-6">
                        <div class="form-group">
                            <label for="fullname">Họ tên</label>
                            <input name="fullname" value="{{ old('fullname') }}" type="text" class="form-control" id="fullname" placeholder="Nhập họ tên">
                            @if($errors->has('fullname'))
                            <span class="text-danger">{{$errors->first('fullname')}}</span>
                            @endif
                        </div>

                        <div class="form-group">
                           <label for="phone">Điện thoại</label>
                           <input name="phone" value="{{ old('phone') }}" type="text" class="form-control" id="phone" placeholder="Nhập số điện thoại">
                           @if($errors->has('phone'))
                           <span class="text-danger">{{$errors->first('phone')}}</span>
                           @endif
                       </div>

                       <div class="form-group">
                           <label for="gender">Giới tính</label>
                           <select class="form-control" name="gender" id="gender">
                            <option value="1">Nam</option>
                            <option value="0">Nữ</option>
                        </select>              
                           @if($errors->has('gender'))
                           <span class="text-danger">{{$errors->first('gender')}}</span>
                           @endif
                       </div>


                         <div class="form-group">
                            <label for="orders">Trạng thái</label>
                            <select class="form-control" name="status" id="status">
                                <option value="1">Xuất bản</option>
                                <option value="2">Chưa xuất bản</option>
                            </select>
                            
                        </div>
                            
                     </div>
                 </div>
             </div>
         </section>


 </div>
</form>
@endsection
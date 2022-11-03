@extends('layouts.site')
@section('title','Đăng ký')
@section('maincontent')
<link rel="stylesheet" href="{{asset('template/plugins/fontawesome-free/css/all.min.css')}}">

<link rel="stylesheet" href="{{asset('template/dist/css/adminlte.min.css')}}">

{{-- login/register starts --}}
<br>
<div class="register-box">

  <div class="container" style="margin-left: 170%">
    
   <div class="card">
     <div class="card-body register-card-body">
       <h3 class="login-box-msg text-dark" style="font-weight: bold;">ĐĂNG KÝ</h3><hr><br>
       {{-- làm việc form đăng ký --}}
       <form action="{{route('doRegister.index')}}" name="formregister" method="POST" enctype="multipart/form-data">
        @includeIf('backend.message')

           @csrf
           @if(Session::has('success'))
           <div class="alert alert-success">{{Session::get('success')}}</div>
           @endif
           @if(Session::has('fail'))
           <div class="alert alert-danger">{{Session::get('fail')}}</div>
           @endif
           {{-- Thông báo lỗi --}}
         @if($errors->has('name'))
         <span class="text-danger">{{$errors->first('name')}}</span> 
         @endif
         {{--end Thông báo lỗi --}}
         <div class="input-group mb-3">
           <input name="name" value="{{old('name')}}" type="text" class="form-control" placeholder="Tên đăng nhập">
           {{-- chú thích: biến value là để giữ lại giá trị name --}}
           <div class="input-group-append">
             <div class="input-group-text">
               <span class="fas fa-user"></span>
             </div>
           </div>
         </div>
          {{-- Thông báo lỗi --}}
          @if($errors->has('email'))
          <span class="text-danger">{{$errors->first('email')}}</span> 
          @endif
          {{--end Thông báo lỗi --}}
          <div class="input-group mb-3">
            <input name="email" value="{{old('email')}}" type="email" class="form-control" placeholder="Email">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-envelope"></span>
              </div>
            </div>
          </div>
          @if($errors->has('fullname'))
          <span class="text-danger">{{$errors->first('fullname')}}</span> 
          @endif
         <div class="input-group mb-3">
           <input name="fullname" value="{{old('fullname')}}" type="text" class="form-control" placeholder="Họ tên">
           {{-- chú thích: biến value là để giữ lại giá trị name --}}
           <div class="input-group-append">
             <div class="input-group-text">
               <span class="fas fa-user"></span>
             </div>
           </div>
         </div>

         @if($errors->has('phone'))
         <span class="text-danger">{{$errors->first('phone')}}</span> 
         @endif
         <div class="input-group mb-3">
            <input name="phone" value="{{old('phone')}}" type="phone" class="form-control" placeholder="Số điện thoại">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-phone"></span>
              </div>
            </div>
          </div>
          @if($errors->has('address'))
          <span class="text-danger">{{$errors->first('address')}}</span> 
          @endif
          <div class="input-group mb-3">
            <input name="address" value="{{old('address')}}" type="text" class="form-control" placeholder="Địa chỉ">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-map-marker"></span>
              </div>
            </div>
          </div>

          @if($errors->has('gender'))
         <span class="text-danger">{{$errors->first('gender')}}</span> 
         @endif
         <p class="text-dark">Giới tính: <input style="margin-left: 10%" type="radio" id="1" name="gender" value="1">
            <label for="gender">Nam</label>
             <input style="margin-left: 10%" type="radio" id="2" name="gender" value="2">
            <label for="gender">Nữ</label></p>
        
         
         {{-- Thông báo lỗi --}}
         @if($errors->has('password'))
         <span class="text-danger">{{$errors->first('password')}}</span> 
         @endif
         {{--end Thông báo lỗi --}}
         <div class="input-group mb-3">
           <input name="password" type="password" class="form-control" placeholder="Nhập mật khẩu">
           <div class="input-group-append">
             <div class="input-group-text">
               <span class="fas fa-lock"></span>
             </div>
           </div>
         </div>
         
             
            

            
         
         <div class="row">
           <!-- /.col -->
           <div class="col-12 ">
             <button type="submit" class="btn btn-primary btn-block">Đăng ký</button>
           </div>
           <!-- /.col -->
         </div>
       </form>
 
       <div class="social-auth-links text-center">
         <hr>
         <p class="mb-0">
           <a href="{{ route('login.index') }}" class="text-center">Đăng nhập </a>
         </p>
       </div>
           
     </div>
     <!-- /.form-box -->
   </div><!-- /.card -->
 </div>
</div> <br>
 @endsection
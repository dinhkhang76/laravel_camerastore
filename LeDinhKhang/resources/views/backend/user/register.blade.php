<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Đăng ký</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{asset('template/plugins/fontawesome-free/css/all.min.css')}}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{asset('template/dist/css/adminlte.min.css')}}">
  
</head>
<body class="hold-transition login-page">
    <div class="register-box">

        @includeIf('backend.message')

        <div class="register-logo">
          <a href="#"><b>ĐĂNG KÝ</b></a>
        </div>
      
        <div class="card">
          <div class="card-body register-card-body">
            <p class="login-box-msg">Thông tin</p>
            {{-- làm việc form đăng ký --}}
            <form action="{{route('doRegister.admin')}}" name="formregister" method="POST" enctype="multipart/form-data">
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
                <a href="login" class="text-center">Đăng nhập </a>
              </p>
            </div>
                
          </div>
          <!-- /.form-box -->
        </div><!-- /.card -->
      </div>

<script src="{{asset('template/plugins/jquery/jquery.min.js')}}"></script>
<!-- Bootstrap 4 -->
<script src="{{asset('template/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{asset('template/dist/js/adminlte.min.js')}}"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{asset('template/dist/js/demo.js')}}"></script>
<script src="{{asset('template/jquery.dataTables.min.js')}}"></script>
    <script>
        $(document).ready( function () {
          $('#myTable').DataTable();
        });
    </script>
</body>
</html>

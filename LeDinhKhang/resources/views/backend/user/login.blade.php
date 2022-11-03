<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-slace=1">
    <title>Đăng nhập</title>
   <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{asset('template/plugins/fontawesome-free/css/all.min.css')}}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{asset('template/dist/css/adminlte.min.css')}}">
</head>
<body class="hold-transition login-page">
    <div class="login-box">
        <div class="login-logo">
            <a href="#"><b>Đăng nhập</b></a>
        </div>
        <div class="card">
            <div class="card-body login-card-body">
                <p class="login-box-msg">Thông tin đăng nhập</p>
                <form action="{{ route('admin.dologin') }}" name="formlogin" method="post">
                    @csrf
                    <div class="input-group mb-3">
                        <input type="text" name="username" required class="form-control" placeholder="Tên đăng nhập hoặc Email">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-envelope"></span>
                            </div>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <input type="password" name="password" required class="form-control" placeholder="Mật khẩu">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-6">
                            <div class="icheck-primary">
                                <input type="checkbox" id="remember">
                                <label for="remember">Nhớ mật khẩu</label>
                            </div>
                        </div>
                        
                    </div>
                    <div class="col-6">
                        <button type="submit" name="DANGNHAP" class="btn btn-primary btn-block" style="margin-left: 80px">Đăng nhập</button>
                    </div>

                </form>
                <div class="social-auth-links text-center mb-3">
                    <p clas='mb-0'>
                        @if (session('message'))
                            <div class="text text-danger">{{ session('message') }}</div>
                            
                        @endif
                        {{-- <hr>
                        <a href="register" class="text-center">Đăng ký </a> --}}

                    </p>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
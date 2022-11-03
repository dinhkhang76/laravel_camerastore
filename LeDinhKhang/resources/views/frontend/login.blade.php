@extends('layouts.site')
@section('title','Đăng nhập')
@section('maincontent')
{{-- login/register starts --}}
  <!--important link source from "https://bootsnipp.com/snippets/vl4R7"-->
<link rel="stylesheet" href="{{asset('template/plugins/fontawesome-free/css/all.min.css')}}">

<link rel="stylesheet" href="{{asset('template/dist/css/adminlte.min.css')}}">

<!------ Include the above in your HEAD tag ---------->

<!DOCTYPE html>
<html>
<head>
   <!--Made with love by Mutiullah Samim -->
   
	<!--Bootsrap 4 CDN-->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    
    <!--Fontawesome CDN-->
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">

	<!--Custom styles-->
	<link rel="stylesheet" type="text/css" href="styles.css">
</head>
<body><br>
<div class="container" style="margin-left: 35%">
	<div class="login-box" style="width: 38%">
      
      <div class="card">
          <div class="card-body login-card-body">
              <h3 class="login-box-msg text-dark" style="font-weight: bold;">ĐĂNG NHẬP</h3><hr><br>
              <form action="{{ route('doLogin.index') }}" name="formlogin" method="POST">
                  @csrf
                  @includeIf('backend.message')
                  <div class="input-group mb-3">
                      <input type="text" required name="name"  class="form-control" placeholder="Tên đăng nhập hoặc Email">
                      <div class="input-group-append">
                          <div class="input-group-text">
                              <span class="fas fa-envelope"></span>
                          </div>
                      </div>
                  </div>
                  <div class="input-group mb-3">
                      <input type="password" required name="password"  class="form-control" placeholder="Mật khẩu">
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
                      <button type="submit" name="DANGNHAP" class="btn btn-primary btn-block" style="margin-left: 100px">Đăng nhập</button>
                  </div>

              </form>
              <div class="social-auth-links text-center mb-3">
                  <p clas='mb-0'>
                      <hr>
                      <a href="{{route('register.index')}}" class="text-center">Đăng ký </a>

                  </p>
              </div>
          </div>
      </div>
  </div><br>
</div>
</body>
</html>
@endsection
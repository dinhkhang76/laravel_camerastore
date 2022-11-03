<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>@yield('title')</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{asset('template/plugins/fontawesome-free/css/all.min.css')}}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{asset('template/dist/css/adminlte.min.css')}}">

@yield('header')

</head>
<body class="hold-transition sidebar-mini">
<!-- Site wrapper -->
<div class="wrapper">
  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="{{ route('dashboard') }}" class="nav-link">Home</a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="#" class="nav-link">Contact</a>
      </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <!-- Navbar Search -->
     

      <!-- Messages Dropdown Menu -->
     
      <!-- Notifications Dropdown Menu -->
      
      <li class="nav-item">
        <a class="nav-link font-weight-bold"  href="#" role="button">
          Xin chào {{ Auth::user()->fullname }}
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link font-weight-bold" href="{{ route('admin.logout') }}" role="button">
          Đăng xuất
        </a>
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{ route('site.home') }}" class="brand-link">
      <img src="{{asset('images/dinhkhangstore.png')}}" class="img-fluid" alt="logo" style="height:50px;width:50px">
      <span class="brand-text font-weight-light">Dinh Khang Store</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="{{asset('template/dist/img/user2-160x160.jpg')}}" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">
            @if (Auth::check())
            <a href="#" class="d-block">{{ Auth::user()->fullname }}</a> 
            @endif</a>
        </div>
      </div>

      

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->


            {{-- Quan ly san pham --}}
               <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Quản lý sản phẩm
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('product.index') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Tất cả sản phẩm</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('category.index') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Danh mục sản phẩm</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('supplier.index') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Nhà cung cấp</p>
                </a>
              </li>
            </ul>
          </li>


          {{-- Quan ly bai viet --}}

          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-copy"></i>
              <p>
                Quản lý bài viết
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('post.index') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Tất cả bài viết</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('topic.index') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Chủ đề bài viết</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('page.index') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Trang đơn</p>
                </a>
              </li>
            </ul>
          </li>
          

             {{-- Quan ly ban hang--}}
                <li class="nav-item">
                  <a href="#" class="nav-link">
                    <i class="nav-icon fas fa-tachometer-alt"></i>
                    <p>
                      Quản lý bán hàng
                      <i class="right fas fa-angle-left"></i>
                    </p>
                  </a>
                  <ul class="nav nav-treeview">
                    <li class="nav-item">
                      <a href="{{ route('order.index') }}" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Tất cả đơn hàng</p>
                      </a>
                    </li>
                    <li class="nav-item">
                      <a href="{{ route('customer.index') }}" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Danh sách khách hàng</p>
                      </a>
                    </li>
                    <li class="nav-item">
                      <a href="" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Thống kê</p>
                      </a>
                    </li>
                  </ul>
                </li>
                

                {{--Lien he --}}
                <li class="nav-item">
                  <a href="{{route('contact.index')}}" class="nav-link">
                    <i class="nav-icon far fa-circle text-warning"></i>
                    <p>Liên hệ</p>
                  </a>
                </li>


                 {{-- Quan ly giao dien--}}
                 <li class="nav-item">
                  <a href="#" class="nav-link">
                    <i class="nav-icon fas fa-chart-pie"></i>
                    <p>
                      Giao diện
                      <i class="right fas fa-angle-left"></i>
                    </p>
                  </a>
                  <ul class="nav nav-treeview">
                    <li class="nav-item">
                      <a href="{{ route('slider.index') }}" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Slider</p>
                      </a>
                    </li>
                    <li class="nav-item">
                      <a href="{{ route('menu.index') }}" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Menu</p>
                      </a>
                    </li>
                   
                  </ul>
                </li>
          {{-- Quan ly he thong--}}
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-cog"></i>
              <p>
                Hệ thống
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('config.index') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Cấu hình</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('user.index') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Danh sách thành viên</p>
                </a>
              </li>
            </ul>
          </li>      

          
         
          
          
        
          
         {{--  <li class="nav-header">LABELS</li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon far fa-circle text-danger"></i>
              <p class="text">Important</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon far fa-circle text-warning"></i>
              <p>Warning</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon far fa-circle text-info"></i>
              <p>Informational</p>
            </a>
          </li> --}}
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  @yield('maincontent')

  <footer class="main-footer">
    <div class="float-right d-none d-sm-block">
      <b>Version</b> 3.1.0
    </div>
    <strong>Copyright &copy; <a href="https://facebook.com">Dinh Khang</a>.</strong> All rights reserved.
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="{{asset('template/plugins/jquery/jquery.min.js')}}"></script>
<!-- Bootstrap 4 -->
<script src="{{asset('template/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{asset('template/dist/js/adminlte.min.js')}}"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{asset('template/dist/js/demo.js')}}"></script>

@yield('footer')
</body>
</html>

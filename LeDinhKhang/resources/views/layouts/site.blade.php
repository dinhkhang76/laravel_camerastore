<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/layoutsite.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('plugin/owlcarousel/css/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('plugin/owlcarousel/css/owl.theme.default.min.css') }}">
    <script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('js/jquery-3.6.0.min.js') }}"></script>
    <script src="{{ asset('js/all.min.js') }}"></script>
    <script src="{{ asset('script.js') }}"></script>
    <script src="{{ asset('plugin/owlcarousel/js/owl.carousel.min.js') }}"></script>
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
    @yield('header')
    {{-- Nút back to top --}}
    <button onclick="topFunction()" id="myBtn" title="Lên trên"><i class="fas fa-arrow-up text-dark"></i></button>

<style>

#myBtn {
    display: none;
    position: fixed;
    bottom: 25px;
    right: 20px;
    z-index: 99;
    font-size: 25px;
    border: none;
    outline: none;
    background-color: rgb(8, 136, 241);
    color: white;
    cursor: pointer;
    padding: 10px;
    border-radius: 4px;
}

#myBtn:hover {
  background-color: rgba(19, 160, 255, 0.479);
}
</style>


<script>
// When the user scrolls down 20px from the top of the document, show the button
window.onscroll = function() {scrollFunction()};

function scrollFunction() {
    if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
        document.getElementById("myBtn").style.display = "block";
    } else {
        document.getElementById("myBtn").style.display = "none";
    }
}

// When the user clicks on the button, scroll to the top of the document
function topFunction() {
    document.body.scrollTop = 0;
    document.documentElement.scrollTop = 0;
}
</script>

</head>
<body>
  {{--  JavaScript SDK plugin facebook --}}
  <div id="fb-root"></div>
<script async defer crossorigin="anonymous" src="https://connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v12.0" nonce="s3UnnyC5"></script>

  <section class="header clearfix">
    <div class="container ">
        <div class="row">
            <div class="col-md-3 my-2 py-0">
              {{-- logo --}}
               <a href="{{ route('site.home') }}"><img src="{{asset('images/dinhkhangstore.png')}}" class="img-fluid rounded-circle" alt="logo" style="height:120px;width:150px"></a>
            </div>
            <div class="col-md-3 my-3 ">  
               {{-- thanh tìm kiếm --}}
              <form class="d-flex my-5" action="{{ route('search.index') }}" method="GET" enctype="multipart/form-data">
              <input class="form-control me-2" type="search" placeholder="Tìm kiếm" aria-label="search" for="search" id="search" name="search">
              <button class="btn btn-outline-warning" type="submit"><ion-icon name="search"></ion-icon></button>
            </form>
          </div>
          <div class="col-md-6 my-4">
            {{-- đăng ký đăng nhập --}}
            @if(Auth::check())
            <p style="margin-left:10%">Xin chào <b style="font-size: 17px">{{ Auth::user()->fullname }}</b></p> 

            &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<a style="margin-left: 10%" href="{{ route('logout.index') }}" class="btn btn-primary position-relative">
              <ion-icon name="log-in"></ion-icon>
              Đăng xuất
              </a>
            @else
            &nbsp&nbsp&nbsp&nbsp<a href="{{ route('login.index') }}" class="btn btn-primary position-relative">
              <ion-icon name="log-in"></ion-icon>
              Đăng nhập   
              </a>
              <a href="{{ route('register.index') }}" class="btn btn-primary position-relative">
                <i class=" fas fa-user"></i>
                Đăng ký &nbsp
                </a>
            @endif
            

              
              {{-- Gio hang --}}
              @php
                  $tongso = \Cart::getTotalQuantity();
                  $tongtien =\Cart::getTotal();
              @endphp
              &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
              
              <a href="{{ route('giohang.index') }}" class="btn btn-success position-relative">
              <i class=" fas fa-shopping-cart"></i>
              ({{ $tongso }})  - {{ number_format($tongtien) }}<sup style="font-weight:bold;">đ</sup>
              </a>
            </div>
            
            {{-- <a href="gio-hang">
              <button id="cart" class="bg-success text-white"> 
                  <i class="fas fa-shopping-cart " aria-hidden="true"></i>
                  Giỏ Hàng
              </button>
            </a> --}}
            
              {{-- <a class="nav-link text-dark" href="/login"><ion-icon name="log-in"></ion-icon> Đăng nhập</a>&nbsp&nbsp
              <a class="nav-link text-dark" href="/dang-ky"><i class="fas fa-user"></i>Đăng ký</a> --}}
            
          
          {{-- giỏ hàng --}}
          {{-- <div class="col-md-3 my-5">
             <button id="cart" class="bg-success text-white">
              <i class="fas fa-shopping-cart " aria-hidden="true"></i>
              Giỏ Hàng
            </button>
          </div> --}}

          
        </div>
      </div>
    </section>
    <section class ="mainmenu clearfix bg-warning">
        <div class="container">
            <div class="row">
                <div class="col-md-1">
                    
                </div>
                <div class="col-md-9">
                  <x-main-menu/>
                </div>
            </div>
        </div>
    </section>
    {{-- end header --}}
    
    <section class ="maincontent clearfix">
      @yield('maincontent')
    </section>
    {{-- end maincontent --}}
   

    <section class ="footer clearfix bg-dark text-white py-3">
      <div class="container">
          <div class="row">
            <div class="col-md-2 col-sm-12 col-xs-12">
              <div class="nav-item text-uppercase">
                  <h5>
                      <span class="text-warning">&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbspGiới thiệu</span>
                  </h5>
              </div>
                  <ul>
                      <li class="text-warning"><a class="nav-link text-white" href="gioi-thieu">Về chúng tôi</a></li>
                  </ul>
            </div>
            
            <x-footer-menu/>
            <div class="col-md-3">
              <div class="item text-uppercase">
                  <h5>
                      <span class="text-warning">&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbspTrợ giúp</span>
                  </h5>
              </div>
                  <ul>
                      <li class="text-warning"><a class="nav-link text-white" href="huong-dan-thanh-toan">Hướng dẫn thanh toán</a></li>
                      <li class="text-warning"><a class="nav-link text-white" href="quy-dinh-doi-tra">Quy định đổi trả</a></li>
                      <li class="text-warning"><a class="nav-link text-white" href="chinh-sach-bao-hanh">Chính sách bảo hành</a></li>

                    </ul>
            </div>
            <div class="footer-box box-address col-md-3 col-sm-12 col-xs-12">
              <div class="item text-uppercase">
                  <h5>
                      <span class="text-warning">&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbspThông tin </span>
                  </h5>
                  <div class="box-address-content">
                      <b >DINH KHANG STORE</b>
                      <p><i class="fa fa-map-marker"></i>  &nbsp &nbsp20 Tăng Nhơn Phú, phường Phước Long B, TP Thủ Đức</p>
                      <p>
                          <i class="fa fa-envelope"></i> &nbsp dinhkhang@gmail.com
                           
                      </p>
                      <p>
                          <i class="fa fa-phone"></i>
                          &nbsp&nbsp0123456798
                      </p>
                      <p><i class="far fa-clock"></i>&nbsp&nbspGiờ làm việc:</p>
                       <p>Thứ 2 - Thứ 7 : 8h30 - 21h </p><p>&nbsp&nbspChủ nhật&nbsp&nbsp&nbsp&nbsp&nbsp: &nbsp&nbsp9h - 17h</p>
                  </div>
              </div>
            </div>

            <div class=" col-md-1 col-sm-12 col-xs-12">
              <div class="item text-uppercase">
                  {{-- <h5><span class="text-warning">Kết nối</span></h5> --}}
                  <div class="nav-item">
                      <ul>
                          <br><a href="https://www.facebook.com/" target="_blank"><i class="fab fa-facebook-f text-primary" style="font-size: 25px"></i></a><br><br>
                          <a href="https://www.youtube.com/" target="_blank"><i class="fab fa-youtube text-danger" style="font-size: 25px"></i></a><br><br>
                          <a href="https://www.instagram.com/" target="_blank"><i class="fab fa-instagram text-danger" style="font-size: 25px"></i></a><br><br>
                          <a href="https://www.twitter.com/" target="_blank"><i class="fab fa-twitter text-info" style="font-size: 25px"></i></a>
                          
                      </ul>
                  </div>
              </div>
            </div>
            
          </div>
        
      </div>
  </section>
  <section class ="copyright clearfix bg-secondary py-1">
      <div class="test2">
          &copy Design by Dinh Khang
      </div>
  </section>


    @yield('footer')
</body>
</html>

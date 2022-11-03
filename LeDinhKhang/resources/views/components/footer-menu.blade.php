<div class=" col-md-3 col-sm-12 col-xs-12">
    <div class="item text-uppercase">
        <h5>
            <span class="text-warning">&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbspMenu   </span>
        </h5>
        
    </div>
        @foreach ($list_menu_footer as $row_menu_footer)
        <ul>
        <li class="text-warning"><a class="nav-link text-white" href="{{ $row_menu_footer->link }}">{{ $row_menu_footer->name }}</a></li>
        </ul>
        @endforeach
        
        {{-- <ul>
            <li class="text-warning"><a class="nav-link text-white" href="/content/huong-dan-thanh-toan.html">Hướng dẫn thanh toán</a></li>
            <li class="text-warning"><a class="nav-link text-white" href="/content/quy-dinh-doi-tra.html">Quy định đổi trả</a></li>
            <li class="text-warning"><a class="nav-link text-white" href="/content/chinh-sach-ban-hang.html">Chính sách bán hàng</a></li>
        </ul> --}}
  </div>
{{-- 48:28 --}}
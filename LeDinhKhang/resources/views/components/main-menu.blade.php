<nav class="navbar navbar-expand-lg navbar-dark bg-warning">
  <div class="container-fluid">
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        @foreach ($list_menu as $menu)
          <x-main-menu-sub :menu="$menu"/>
          {{-- <li class="nav-item">
            <a class="nav-link" aria-current="page" href="{{$menu->link}}">{{$menu->name}}</a>
          </li> --}}
        @endforeach
      </ul>
    </div>
  </div>
 {{--  <form class="d-flex ">
    <input class="form-control me-2" type="search" placeholder="Tìm kiếm" aria-label="Search">
    <button class="btn btn-outline-dark" type="submit"><ion-icon name="search-outline"></ion-icon></button>
  </form> --}}
</nav>
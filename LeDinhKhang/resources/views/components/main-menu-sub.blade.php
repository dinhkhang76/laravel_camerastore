@if ($sub == false)
    <li class="nav-item">
        <a class="nav-link text-dark text-uppercase"style="font-weight:bold" href="{{ $row_menu->link }}">{{ $row_menu->name }}</a>
    </li>
@else
    <li class="nav-item dropdown">
        <a class="nav-link text-uppercase dropdown-toggle "style="font-weight:bold;color:red;" href="{{ $row_menu->link }}" id="navbarDropdown" 
            role="button" data-bs-toggle="dropdown" aria-expanded="false">
            {{ $row_menu->name }}
        </a>
        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
            @foreach ($list_menu_sub as $menu_sub)
                <li><a class="dropdown-item" href="{{ $menu_sub->link }}">{{ $menu_sub->name }}</a></li>
            @endforeach
        </ul>
    </li>
@endif
<div class="collapse navbar-collapse " id="navbarSupportedContent">
    <ul class="navbar-nav ml-auto">
        @foreach($menu as $menuItem)
            <li class="nav-item active">
                <a class="nav-link" href="{{ route($menuItem->route) }}">
                    {{ $menuItem->link_name }}
                    {{--var_dump($menuItem->link_name)--}}
                </a>
            </li>
        @endforeach
    </ul>
    <div class="quote_btn-container">

        <!-- dropleft -> user LOG IN n REGISTER -->
        <div class="btn-group dropleft col-lg-4">
            @if(session()->has('user'))
                @if(session()->get('user')->id_role == 1)
                    <button type="button" class="btn btn-user" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="fa fa-user" aria-hidden="true"></i> <span class="emailLogged">{{ session()->get('user')->email }}</span>
                    </button>
                    @elseif(session()->get('user')->id_role == 2)
                    <button type="button" class="btn btn-user">
                        <i class="fa fa-user" aria-hidden="true"></i> <span class="emailLogged">{{ session()->get('user')->email }}</span>
                    </button>
                @endif

            @else
                <button type="button" class="btn btn-user" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="fa fa-user" aria-hidden="true"></i>
                </button>
            @endif
            <div class="dropdown-menu">
                @if(!session()->has('user'))
                    <a class="dropdown-item" type="button" href="{{route('login')}}">Log in</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" type="button" href="{{route('register')}}">Register</a>
                @elseif(session()->has('user'))
                    @if(session()->get('user')->id_role == 1)
                        <a class="dropdown-item" type="button" href="{{ route('admin-panel') }}">Admin panel</a>
                   @endif
                @endif
            </div>
        </div>
    </div>
   @if(session()->has('user'))
        @if(session()->get('user')->id_role == 2)
            <a class="log-out mx-1 mr-4" href="{{route('cart')}}"><i class="fa-solid fa-cart-shopping"></i></a>
        @endif
    @endif
    @if(session()->has('user'))
        <a href="{{ route('logout') }}" class="log-out"><i class="fa fa-sign-out" aria-hidden="true"></i></a>
    @endif
</div>

<li>
    <a class="@activeIfUrl('/','active')" href="{{ url('/') }}">
        <i class="si si-home"></i>Home
    </a>
</li>
{{--  <li class="nav-main-heading">Heading</li>  --}}
 <li>
    <a class="nav-submenu " data-toggle="nav-submenu" href="#">
        <i class="si si-puzzle"></i>Dropdown
    </a>
    <ul >
        <li>
            <a href="javascript:void(0)">Link #1</a>
        </li>
        <li>
            <a href="javascript:void(0)">Link #2</a>
        </li>
        <li>
            <a class="nav-submenu" data-toggle="nav-submenu" href="#">Dropdown</a>
            <ul>
                <li>
                    <a href="javascript:void(0)">Link #1</a>
                </li>
                <li>
                    <a href="javascript:void(0)">Link #2</a>
                </li>
            </ul>
        </li>
    </ul>
</li> 
{{--  <li class="nav-main-heading">Vital</li>  --}}
<li>
    <a class="@activeIfUrl('blog','active')" href="{{ url('/blog') }}">
        <i class="si si-wrench"></i>Blog
    </a>
</li>
<li>
    <a href="javascript:void(0)">
        <i class="si si-wrench"></i>Page
    </a>
</li>
{{-- Login --}}
<li class="nav-main-heading">Login</li>
@guest
    <li>
        <a class="nav-submenu" data-toggle="nav-submenu" href="javascript:void(0)">
                <i class="si si-puzzle"></i>Login</a>
        <ul>
            <li>
                <a href="{{ route('login') }}">
                        <i class="si si-wrench"></i>{{ __('Entrar') }}</a>
            </li>
            <li>
                <a href="{{ route('register') }}">{{ __('Registrar') }}</a>
            </li>
        </ul>
    </li>
@else
    <li>
        <a class="nav-submenu" data-toggle="nav-submenu" href="javascript:void(0)">
            <i class="si si-puzzle"></i>{{ Auth::user()->name }}
        </a>
        <ul>
            <li>
                <a href="{{ route('logout') }}"
                    onclick="event.preventDefault();
                                    document.getElementById('logout-form').submit();">
                    {{ __('Logout') }}
                </a>    
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
            </li>
        </ul>
    </li>
@endguest
{{-- EndLogin --}}
@stack('menu')
<li>
    <a class="@activeIfUrl('/','active')" href="{{ url('/') }}">
        <i class="si si-home"></i>Home
    </a>
</li>
{{--  <li class="nav-main-heading">Heading</li>  --}}
{{--  <li class="@activeIfUrl('blog','open')">
    <a class="nav-submenu " data-toggle="nav-submenu" href="#">
        <i class="si si-puzzle"></i>Dropdown
    </a>
    <ul class="open" >
        <li>
            <a class="active"  href="javascript:void(0)">Link #1</a>
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
</li>  --}}
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
<li>
    <a href="javascript:void(0)">
        <i class="si si-wrench"></i>Page
    </a>
</li>
@stack('menu')
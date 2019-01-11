<li class="nav-main-heading">
    <span class="sidebar-mini-visible">BG</span>
    <span class="sidebar-mini-hidden">Blog</span>
</li>
<li class="@activeIfUrl('blog/admin*','open')">
    <a class="nav-submenu" data-toggle="nav-submenu" href="javascript:void(0)">
        <i class="si si-briefcase"></i>
        <span class="sidebar-mini-hide">Blog</span>
    </a>
    <ul>
        <li>
            <a class="@activeIfUrl('blog/admin/post','active')" href="{{ route('allPosts') }}">
                <span class="sidebar-mini-hide">
                    <i class="fa fa-eye mr-5"></i> 
                    {{ __('Posts') }}
                </span>
            </a>
        </li>
        <li>
            <a class="@activeIfUrl('blog/admin/post/create','active')" href="{{ route('post.create') }}">
                <span class="sidebar-mini-hide">
                    <i class="fa fa-edit mr-5"></i> 
                    {{ __('Criar post') }}
                </span>
            </a>
        </li>        
    </ul>
</li>
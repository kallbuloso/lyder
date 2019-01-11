<div class="col-xl-4">
        <!-- Twitter Feed -->
        <div class="block block-transparent">
            <div class="block-header">
                <h3 class="block-title text-uppercase">Twitter Feed</h3>
                <div class="block-options">
                    <a class="btn btn-sm btn-alt-secondary" href="javascript:void(0)">
                        <i class="si si-social-twitter mr-5"></i> Follow Us
                    </a>
                </div>
            </div>
            <div class="block-content">
                <div class="media mb-20">
                    <img class="img-avatar img-avatar32 d-flex mr-20" src="assets/img/avatars/avatar13.jpg" alt="">
                    <div class="media-body">
                        <p class="mb-5">In gravida nulla. Nulla vel metus scelerisque ante sollicitudin. <a class="text-elegance" href="javascript:void(0)">#startup</a> <a class="text-elegance" href="javascript:void(0)">#life</a></p>
                        <div class="font-size-sm text-muted">10 hrs ago</div>
                    </div>
                </div>
                <div class="media mb-20">
                    <img class="img-avatar img-avatar32 d-flex mr-20" src="assets/img/avatars/avatar5.jpg" alt="">
                    <div class="media-body">
                        <p class="mb-5">Vestibulum in vulputate at, tempus viverra turpis. Fusce <a href="javascript:void(0)">condimentum</a> nunc ac nisi vulputate fringilla.</p>
                        <div class="font-size-sm text-muted">15 hrs ago</div>
                    </div>
                </div>
                <div class="media mb-20">
                    <img class="img-avatar img-avatar32 d-flex mr-20" src="assets/img/avatars/avatar6.jpg" alt="">
                    <div class="media-body">
                        <p class="mb-5">In gravida nulla. Nulla vel metus scelerisque ante sollicitudin.</p>
                        <div class="font-size-sm text-muted">2 days ago</div>
                    </div>
                </div>
                <div class="media mb-20">
                    <img class="img-avatar img-avatar32 d-flex mr-20" src="assets/img/avatars/avatar16.jpg" alt="">
                    <div class="media-body">
                        <p class="mb-5">Vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum <a href="javascript:void(0)">nunc</a> ac nisi vulputate fringilla. <a class="text-elegance" href="javascript:void(0)">#web</a> <a class="text-elegance" href="javascript:void(0)">#stuff</a></p>
                        <div class="font-size-sm text-muted">5 days ago</div>
                    </div>
                </div>
                <div class="media mb-20">
                    <img class="img-avatar img-avatar32 d-flex mr-20" src="assets/img/avatars/avatar8.jpg" alt="">
                    <div class="media-body">
                        <p class="mb-5">Vestibulum in vulputate at, tempus viverra turpis. Fusce <a href="javascript:void(0)">condimentum</a> nunc ac nisi vulputate fringilla.</p>
                        <div class="font-size-sm text-muted">1 week ago</div>
                    </div>
                </div>
            </div>
        </div>
        <!-- END Twitter Feed -->

        <!-- Categories -->
        <div class="block block-transparent">
            <div class="block-header">
                <h3 class="block-title text-uppercase">
                    <i class="fa fa-fw fa-list mr-5"></i> Categories
                </h3>
            </div>
            <div class="block-content">
                <ul class="nav nav-pills flex-column push">
                    <li class="nav-item">
                        <a class="nav-link d-flex align-items-center justify-content-between active" href="javascript:void(0)">
                            <span><i class="fa fa-fw fa-star mr-5"></i> News</span>
                            <span class="badge badge-pill badge-secondary">59</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link d-flex align-items-center justify-content-between" href="javascript:void(0)">
                            <span><i class="fa fa-fw fa-magic mr-5"></i> Special Offers</span>
                            <span class="badge badge-pill badge-secondary">40</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link d-flex align-items-center justify-content-between" href="javascript:void(0)">
                            <span><i class="fa fa-fw fa-briefcase mr-5"></i> Products</span>
                            <span class="badge badge-pill badge-secondary">95</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link d-flex align-items-center justify-content-between" href="javascript:void(0)">
                            <span><i class="fa fa-fw fa-pencil mr-5"></i> Tutorials</span>
                            <span class="badge badge-pill badge-secondary">25</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link d-flex align-items-center justify-content-between" href="javascript:void(0)">
                            <span><i class="fa fa-fw fa-book mr-5"></i> Guides</span>
                            <span class="badge badge-pill badge-secondary">49</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link d-flex align-items-center justify-content-between" href="javascript:void(0)">
                            <span><i class="fa fa-fw fa-newspaper-o mr-5"></i> Updates</span>
                            <span class="badge badge-pill badge-secondary">78</span>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
        <!-- END Categories -->

        <!-- Tag Cloud -->
        <div class="block block-transparent">
            <div class="block-header">
                <h3 class="block-title text-uppercase">
                    <i class="fa fa-fw fa-tags mr-5"></i> Tag Cloud
                </h3>
            </div>
            <div class="block-content block-content-full">
                @isset($tag)                    
                    @foreach ($tags as $tag)
                        <a class="btn btn-sm btn-alt-secondary mb-5" href="{{ route('tags.show', $tag) }}">
                            <i class="fa fa-tag text-muted mr-5"></i>{{ $tag->name }} 
                        </a>
                    @endforeach
                @endisset
            </div>
        </div>
        <!-- END Tag Cloud -->
    </div>
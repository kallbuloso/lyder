@extends('blog::layouts.front')

@section('main-container')
    <main id="main-container">
        <!-- Hero -->
        <div class="bg-primary overflow-hidden">
            <div class="bg-pattern bg-black-op-25" style="background-image: url('assets/img/various/bg-pattern.png');">
                <div class="hero-inner">
                    <div class="content content-full text-center">
                        <h1 class="display-1 font-w700 text-white mb-10 invisible" data-toggle="appear" data-class="animated fadeInDown">
                            Blog
                        </h1>
                        <h2 class="font-w400 text-white-op mb-50 invisible" data-toggle="appear" data-class="animated fadeInDown">
                            Our latest news and learning articles.
                        </h2>
                        <a class="btn btn-hero btn-noborder btn-rounded btn-success mr-5 mb-10 invisible" data-toggle="appear" data-class="animated fadeInUp" href="javascript:void(0)">
                            <i class="fa fa-rocket mr-10"></i> Call to Action
                        </a>
                        <a class="btn btn-hero btn-noborder btn-rounded btn-primary mb-10 invisible" data-toggle="appear" data-class="animated fadeInUp" href="javascript:void(0)">
                            <i class="fa fa-rocket mr-10"></i> Call to Action
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <!-- END Hero -->
        <!-- Blog and Sidebar -->
        <div class="content">
            <div class="row items-push py-30">
                <!-- Posts -->
                <div class="col-xl-8">
                    @foreach ($posts as $post)
                    <div class="mb-50">
                        <div class="overflow-hidden rounded mb-20" style="height: 200px;">
                            <a class="img-link" href="be_pages_generic_story.html">
                                <img class="img-fluid" src="assets/img/photos/photo3@2x.jpg" alt="">
                            </a>
                        </div>
                        <h3 class="h4 font-w700 text-uppercase mb-5">{{ $post->title }}</h3>
                        <div class="text-muted mb-10">
                            <span class="mr-15">
                                <i class="fa fa-fw fa-calendar mr-5"></i>{{ $post->date }}
                            </span>
                            <a class="text-muted mr-15" href="be_pages_generic_profile.html">
                                <i class="fa fa-fw fa-user mr-5"></i>{{ $post->author->name }}
                            </a>
                            <a class="text-muted mr-15" href="javascript:void(0)">
                                <i class="fa fa-folder-open mr-5"></i> {{ $post->category->name }}
                            </a>
                            <a class="text-muted mr-15" href="javascript:void(0)">
                                <i class="fa fa-comment mr-5"></i> Comentários 23
                            </a>
                        </div>
                        <P>@truncate($post->excerpt,'220')</P>
                        @isset($post->tags)
                        <div class="text-muted mb-10">
                            @foreach ($post->tags as $tag)
                                <a class="text-muted" href="javascript:void(0)">
                                    <i class="fa fa-fw fa-tag"></i>{{ $tag->name }} 
                                </a>
                            @endforeach                            
                        </div>                            
                        @endisset
                        <a class="link-effect font-w600" href="be_pages_generic_story.html">{{ __('Ler Mais...') }}</a>
                    </div>                        
                    @endforeach
                    <nav class="clearfix push">
                        <a class="btn btn-secondary min-width-100 float-right" href="javascript:void(0)">
                            Next <i class="fa fa-arrow-right ml-5"></i>
                        </a>
                        <a class="btn btn-secondary min-width-100 float-left" href="javascript:void(0)">
                            <i class="fa fa-arrow-left mr-5"></i> Prev
                        </a>
                    </nav>
                    <hr class="d-xl-none">
                </div>
                <!-- END Posts -->

                <!-- Sidebar -->
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
                            <a class="btn btn-sm btn-alt-secondary mb-5" href="javascript:void(0)">
                                <i class="fa fa-tag text-muted mr-5"></i>html5
                            </a>
                            <a class="btn btn-sm btn-alt-secondary mb-5" href="javascript:void(0)">
                                <i class="fa fa-tag text-muted mr-5"></i>css3
                            </a>
                            <a class="btn btn-sm btn-alt-secondary mb-5" href="javascript:void(0)">
                                <i class="fa fa-tag text-muted mr-5"></i>javascript
                            </a>
                            <a class="btn btn-sm btn-alt-secondary mb-5" href="javascript:void(0)">
                                <i class="fa fa-tag text-muted mr-5"></i>angular2
                            </a>
                            <a class="btn btn-sm btn-alt-secondary mb-5" href="javascript:void(0)">
                                <i class="fa fa-tag text-muted mr-5"></i>vuejs
                            </a>
                            <a class="btn btn-sm btn-alt-secondary mb-5" href="javascript:void(0)">
                                <i class="fa fa-tag text-muted mr-5"></i>react
                            </a>
                            <a class="btn btn-sm btn-alt-secondary mb-5" href="javascript:void(0)">
                                <i class="fa fa-tag text-muted mr-5"></i>php
                            </a>
                            <a class="btn btn-sm btn-alt-secondary mb-5" href="javascript:void(0)">
                                <i class="fa fa-tag text-muted mr-5"></i>ruby
                            </a>
                            <a class="btn btn-sm btn-alt-secondary mb-5" href="javascript:void(0)">
                                <i class="fa fa-tag text-muted mr-5"></i>jquery
                            </a>
                            <a class="btn btn-sm btn-alt-secondary mb-5" href="javascript:void(0)">
                                <i class="fa fa-tag text-muted mr-5"></i>modern
                            </a>
                            <a class="btn btn-sm btn-alt-secondary mb-5" href="javascript:void(0)">
                                <i class="fa fa-tag text-muted mr-5"></i>dashboard
                            </a>
                            <a class="btn btn-sm btn-alt-secondary mb-5" href="javascript:void(0)">
                                <i class="fa fa-tag text-muted mr-5"></i>themes
                            </a>
                            <a class="btn btn-sm btn-alt-secondary mb-5" href="javascript:void(0)">
                                <i class="fa fa-tag text-muted mr-5"></i>freebies
                            </a>
                        </div>
                    </div>
                    <!-- END Tag Cloud -->
                </div>
                <!-- END Sidebar -->
            </div>
        </div>
        <!-- END Blog and Sidebar -->

        {{--  <!-- Inspiring Quotes -->
        <div class="bg-body-dark">
            <div class="content content-full text-center">
                <div class="py-30 invisible" data-toggle="appear">
                    <!-- Quotes Slider (.js-slider class is initialized in Codebase() -> uiHelperSlick()) -->
                    <!-- For more info and examples you can check out http://kenwheeler.github.io/slick/ -->
                    <div class="js-slider slick-nav-black" data-autoplay="true" data-autoplay-speed="6000">
                        <div>
                            <div class="h3 font-w700 mb-10">&ldquo; Strive not to be a success, but rather to be of value &rdquo;</div>
                            <div class="h4 font-w400 text-muted"><em>Albert Einstein</em></div>
                        </div>
                        <div>
                            <div class="h3 font-w700 mb-10">&ldquo; Success is where preparation and opportunity meet &rdquo;</div>
                            <div class="h4 font-w400 text-muted"><em>Bobby Unser</em></div>
                        </div>
                        <div>
                            <div class="h3 font-w700 mb-10">&ldquo; Life is really simple, but we insist on making it complicated &rdquo;</div>
                            <div class="h4 font-w400 text-muted"><em>Confucius</em></div>
                        </div>
                    </div>
                    <!-- END Quotes Slider -->
                </div>
            </div>
        </div>
        <!-- END Inspiring Quotes -->  --}}
    </main>
@stop

@push('scripts')
@endpush

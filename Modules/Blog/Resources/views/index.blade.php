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
                        @isset($title)
                            <h2 class="font-w400 text-white-op mb-50 invisible" data-toggle="appear" data-class="animated fadeInDown">
                                {{ $title }}
                            </h2>
                        @else
                            <h2 class="font-w400 text-white-op mb-50 invisible" data-toggle="appear" data-class="animated fadeInDown">
                                Our latest news and learning articles.
                            </h2>
                        @endisset
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
                        @if ($post->photos->count() === 1)                                    
                            <div class="overflow-hidden rounded mb-20" style="height: 200px;">
                                <a class="img-link" href="be_pages_generic_story.html">
                                    <img class="img-fluid" src="{{ $post->photos->first()->url }}   " alt="">
                                </a>
                            </div>
                        @endif
                        <h3 class="h4 font-w700 text-uppercase mb-5">
                            <a href="blog/{{ $post->url }}">{{ $post->title }}</a>
                        </h3>
                        <div class="text-muted mb-10">
                            <span class="mr-15">
                                <i class="fa fa-fw fa-calendar mr-5"></i>{{ $post->date }}
                            </span>
                            <a class="text-muted mr-15" href="be_pages_generic_profile.html">
                                <i class="fa fa-fw fa-user mr-5"></i>{{ $post->author->name }}
                            </a>
                            @if (isset($post->category->name))
                                <a class="text-muted mr-15" href="{{ route('categories.show', $post->category) }}">
                                    <i class="fa fa-folder-open mr-5"></i> {{ $post->category->name }}
                                </a>                                
                            @endif
                            <a class="text-muted mr-15" href="javascript:void(0)">
                                <i class="fa fa-comment mr-5"></i> Comentários 23
                            </a>
                        </div>
                        <P>@truncate($post->excerpt,'220')</P>
                        @isset($post->tags)
                        <div class="text-muted mb-10">
                            @foreach ($post->tags as $tag)
                                <a class="btn btn-sm btn-alt-secondary mb-5" href="{{ route('tags.show', $tag) }}">
                                    <i class="fa fa-tag text-muted mr-5"></i>{{ $tag->name }} 
                                </a>
                            @endforeach                            
                        </div>                            
                        @endisset
                        <a class="link-effect font-w600" href="blog/{{ $post->url }}">{{ __('Ler Mais...') }}</a>
                    </div>                        
                    @endforeach
                    <nav class="clearfix push">
                            {{ $posts->links() }}
                    </nav>

                    <hr class="d-xl-none">
                </div>
                <!-- END Posts -->

                <!-- Sidebar -->
                @include('blog::layouts.sidebar')
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

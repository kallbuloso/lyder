@extends('blog::layouts.front')
{{--  Meta  --}}
@section('title_header', $post->title)
@section('description', $post->excerpt)

@section('main-container')
    <main id="main-container">
        <!-- Hero -->
        <div class="bg-primary overflow-hidden">
            @if ($post->photos->count() === 1)
                <div class="bg-image" style="background-image: url({{ $post->photos->first()->url }});">                
            @else                
                <div class="bg-image" style="background-image: url('/assets/img/photos/photo27@2x.jpg');">
            @endif
                <div class="hero-inner bg-black-op-75">
                    <div class="content content-full text-center">
                        <div class="py-100">
                            <h1 class="font-w700 text-white mb-10"  data-toggle="appear" data-class="animated fadeInDown">{{ $post->title }}</h1>
                            <h2 class="h4 font-w400 text-white-op" data-toggle="appear" data-class="animated fadeInUp">{{ $post->excerpt }}</h2>
                            <div class="font-size-md text-muted">
                                @if (isset($post->category->name))
                                    <a class="text-muted mr-15" href="javascript:void(0)">
                                        <i class="fa fa-folder-open mr-5"></i> {{$post->category->name}}
                                    </a>                                
                                @endif
                                <a class="text-body-bg-dark" href="be_pages_generic_profile.html">{{ $post->author->nik_name }}</a> 
                                &bull; {{ date('d/m/Y', strtotime($post->published_at)) }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- END Hero -->
        <!-- Blog and Sidebar -->
        <div class="content">
            <div class="row items-push py-30">
                <!-- Post -->
                <div class="col-xl-8">
                    {!! $post->body !!}
                    @isset($post->tags)
                        <div class="row px-15">
                            @foreach ($post->tags as $tag)
                                <a class="btn btn-sm btn-alt-secondary mb-5" href="javascript:void(0)">
                                    <i class="fa fa-tag text-muted mr-5"></i>{{ $tag->name }}
                                </a>
                            @endforeach
                        </div>
                    @endisset
                    <div class="row py-30">
                        <div class="col-xl-12 clearfix">
                            <button type="button" class="btn btn-rounded btn-secondary float-right">
                                <i class="fa fa-share-alt text-primary mr-5 "></i> Share
                            </button>
                            <button type="button" class="btn btn-rounded btn-secondary float-left">
                                <i class="fa fa-heart text-danger mr-5 "></i> Reccomend
                            </button>
                        </div>
                    </div>
                </div>

                <!-- END Post -->

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

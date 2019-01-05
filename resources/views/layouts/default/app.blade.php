<!DOCTYPE html>
<!--[if lte IE 9]>         <html lang="{{ config('cb.lang') }}" class="lt-ie10 lt-ie10-msg no-focus"> <![endif]-->
<!--[if gt IE 9]><!--> <html lang="{{ config('cb.lang') }}" class="no-focus"> <!--<![endif]-->
<html lang="{{ config('cb.lang') }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">

        <title>@yield('title_header', config('app.name'))</title>

        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <meta name="description" content="Codebase - Bootstrap 4 Admin Template &amp; UI Framework created by pixelcave and published on Themeforest">
        <meta name="author" content="pixelcave">
        <meta name="robots" content="noindex, nofollow">

        <!-- Open Graph Meta -->
        <meta property="og:title" content="Codebase - Bootstrap 4 Admin Template &amp; UI Framework">
        <meta property="og:site_name" content="Codebase">
        <meta property="og:description" content="Codebase - Bootstrap 4 Admin Template &amp; UI Framework created by pixelcave and published on Themeforest">
        <meta property="og:type" content="website">
        <meta property="og:url" content="">
        <meta property="og:image" content="">
        <!-- Custom Meta -->
        @stack('meta')
        <!-- End Custom Meta -->

        <!-- Icons -->
        <!-- The following icons can be replaced with your own, they are used by desktop and mobile browsers -->
        <link rel="shortcut icon" href="/assets/img/favicons/favicon.png">
        <link rel="icon" type="image/png" sizes="192x192" href="/assets/img/favicons/favicon-192x192.png">
        <link rel="apple-touch-icon" sizes="180x180" href="/assets/img/favicons/apple-touch-icon-180x180.png">
        <!-- END Icons -->

        <!-- Stylesheets -->
        <!-- Custom Stylesheet -->
        @stack('stylesheet')
        <!-- End Custom Stylesheet -->

        <!-- Base framework -->
        @asset('assets/css/codebase.css','css-main')
        

        <!-- You can include a specific file from css/themes/ folder to alter the default color theme of the template. eg: -->
        {{--  @asset('assets/css/themes/corporate.min.css','css-main')  --}}
        <!-- END Stylesheets -->
    </head>
    <body>
        @yield('container')
        
        {{--  @asset('assets/js/codebase.min.js')  --}}
        <!-- Codebase Core JS -->
        @asset('assets/js/core/jquery.min.js')
        @asset('assets/js/core/bootstrap.bundle.min.js')
        @asset('assets/js/core/jquery.slimscroll.min.js')
        @asset('assets/js/core/jquery.scrollLock.min.js')
        @asset('assets/js/core/jquery.appear.min.js')
        @asset('assets/js/core/jquery.countTo.min.js')
        @asset('assets/js/core/js.cookie.min.js')
        @asset('assets/js/codebase.js')

        <!-- Custom Scripts -->
        @stack('scripts')
        <!-- End Custom Scripts -->
    </body>
</html>
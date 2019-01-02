@extends('layouts.default.app')

@section('container')
<div id="page-container" class="sidebar-inverse side-scroll page-header-fixed page-header-glass page-header-inverse main-content-boxed">
    <!-- Sidebar -->
    @include('layouts.default.frontend.sidebar')
    <!-- END Sidebar -->

    <!-- Header -->
    @include('layouts.default.frontend.header')
    <!-- END Header -->

    <!-- Main Container -->
    @yield('main-container')
    <!-- END Main Container -->

    <!-- Footer -->
    @include('layouts.default.footer')
    <!-- END Footer -->
</div>
@endsection
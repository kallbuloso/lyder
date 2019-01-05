@extends('layouts.default.app')

@section('container')
<div id="page-container" class="sidebar-o side-scroll sidebar-inverse page-header-fixed page-header-glass page-header-inverse ">
    <!-- Side Overlay-->
    @include('layouts.default.backend.side')
    <!-- END Side Overlay -->
    <!-- Sidebar -->
    @include('layouts.default.backend.sidebar')
    <!-- END Sidebar -->

    <!-- Header -->
    @include('layouts.default.backend.header')
    <!-- END Header -->

    <!-- Main Container -->
    @yield('main-container')
    <!-- END Main Container -->

    <!-- Footer -->
    @include('layouts.default.footer')
    <!-- END Footer -->
</div>
@endsection
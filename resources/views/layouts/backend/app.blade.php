@extends('layouts.default.app')
@push('scripts')
    @asset('assets/js/core/jquery.appear.min.js')
    @asset('assets/js/core/js.cookie.min.js')
    {{-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js"></script>  --}}
    {{--  <script src="/assets/js/core/jquery.min.js"></script>  --}}
    {{--  <script src="/assets/js/core/bootstrap.bundle.min.js"></script>  --}}
    {{--  <script src="/assets/js/core/jquery.slimscroll.min.js"></script>  --}}
    {{--  <script src="/assets/js/core/jquery.scrollLock.min.js"></script>  --}}
    {{--  <script src="/assets/js/core/jquery.appear.min.js"></script>  --}}
    {{--  <script src="/assets/js/core/jquery.countTo.min.js"></script>  --}}
    {{--  <script src="/assets/js/core/js.cookie.min.js"></script>  --}}
    {{--  <script src="/assets/js/codebase.js"></script>  --}}

@endpush

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
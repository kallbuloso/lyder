@extends('layouts.default.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Verify Your Email Address') }}</div>

                <div class="card-body">
                    @if (session('resent'))
                        <div class="alert alert-success" role="alert">
                            {{ __('A fresh verification link has been sent to your email address.') }}
                        </div>
                    @endif

                    {{ __('Before proceeding, please check your email for a verification link.') }}
                    {{ __('If you did not receive the email') }}, <a href="{{ route('verification.resend') }}">{{ __('click here to request another') }}</a>.
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('container')
    <div id="page-container" class="main-content-boxed">
        <!-- Main Container -->
        <main id="main-container">
            <!-- Page Content -->
            <div class="bg-image" style="background-image: url('/assets/img/photos/photo34@2x.jpg');">
                <div class="row mx-0 bg-black-op">
                    <div class="hero-static col-md-6 col-xl-8 d-none d-md-flex align-items-md-end">
                        <div class="p-30 invisible" data-toggle="appear">
                            <p class="font-size-h3 font-w600 text-white">
                                {{ __('Get Inspired and Create') }}.
                            </p>
                            <p class="font-italic text-white-op">
                                Copyright &copy; <span class="js-year-copy">2015</span>
                            </p>
                        </div>
                    </div>
                    <div class="hero-static col-md-6 col-xl-4 d-flex align-items-center bg-white invisible" data-toggle="appear" data-class="animated fadeInRight">
                        <div class="content content-full">
                            <!-- Header -->
                            <div class="px-30 py-10">
                                <a class="link-effect font-w700" href="{{ url('/') }}">
                                    @include('layouts.default.logo')
                                </a>
                                @if (session('resent'))
                                    <h1 class="h3 font-w700 mt-30 mb-10">{{ __('Reenvio de confirmação de E-mail!') }}</h1>
                                    <h2 class="h5 font-w400 text-muted mb-0">{{ __('Um e-mail de verificação foi reenviado para: '. Auth::user()->email) }}</h2>
                            </div>                                
                                @else
                                    <h1 class="h3 font-w700 mt-30 mb-10">{{ __('Cadastro efetuado com sucesso!') }}</h1>
                                    <h2 class="h5 font-w400 text-muted mb-0">{{ __('Abra seu e-mail e clique no botão de  confirmação.') }}</h2>
                                    <h2 class="h5 font-w400 text-muted mb-0">{{ __('Caso você não tenha recebido o e-mail clique no botão abaixo para enviarmos novamente') }}.</h2>
                            </div>
                                    <div class="form-group px-30 py-10">
                                        <a href="{{ route('verification.resend') }}">
                                            <buttontype="button" class="btn btn-sm btn-hero btn-alt-success">
                                                <i class="si si-plus mr-10"></i> {{ __('Reenviar e-mail') }}
                                            </button>
                                        </a>
                                    </div>
                                @endif
                            <!-- END Header -->
                        </div>
                    </div>
                </div>
            </div>
            <!-- END Page Content -->
        </main>
        <!-- END Main Container -->
    </div>
@endsection

@push('scripts')
@asset('assets/js/core/jquery.appear.min.js')
@endpush

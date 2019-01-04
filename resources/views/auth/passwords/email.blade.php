@extends('layouts.default.app')

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
                                {{ __('You are awesome! Build something amazing!') }}
                            </p>
                            <p class="font-italic text-white-op">
                                Copyright &copy; <span class="js-year-copy">2015</span>
                            </p>
                        </div>
                    </div>
                    <div class="hero-static col-md-6 col-xl-4 d-flex align-items-center bg-white invisible" data-toggle="appear" data-class="animated fadeInRight">
                        <div class="content content-full">
                            <!-- Header -->
                            <div class="px-10 py-10">
                                <a class="link-effect font-w700" href="{{ url('/') }}">
                                    @include('layouts.default.logo')
                                </a>
                                <h1 class="h3 font-w700 mt-30 mb-10">{{ __('Não se preocupe, nós podemos ajudar') }}</h1>
                                <h2 class="h5 font-w400 text-muted mb-0">{{ __('Por favor, digite seu e-mail') }}</h2>
                            </div>
                            <!-- END Header -->
                                <div class="px-10 py-10">
                                    @if (session('status'))
                                        <div class="alert alert-success" role="alert">
                                            {{ session('status') }}
                                        </div>
                                    @endif
                                </div>
                            
                            <form class="px-10" action="{{ route('password.email') }}" method="post">
                                @csrf
                                <div class="form-group row">
                                    <div class="col-12">
                                        <div class="form-material floating">
                                            <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" autofocus>
                                            <label for="email">{{ __('Seu E-Mail') }}</label>
                                            @if ($errors->has('email'))
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->first('email') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-sm btn-hero btn-alt-primary">
                                        <i class="fa fa-asterisk mr-10"></i> {{ __('Enviar email recuperador de senha') }}
                                    </button>
                                    <div class="mt-30">
                                        <a class="link-effect text-muted mr-10 mb-5 d-inline-block" href="{{ route('login') }}">
                                            <i class="fa fa-user text-muted mr-5"></i> {{ __('Lembrei a senha') }}
                                        </a>
                                        <a class="link-effect text-muted mr-10 mb-5 d-inline-block" href="{{ route('register') }}">
                                            <i class="fa fa-plus mr-5"></i> {{ __('Criar uma conta') }}
                                        </a>
                                    </div>
                                </div>
                            </form>
                            <!-- END Reminder Form -->
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
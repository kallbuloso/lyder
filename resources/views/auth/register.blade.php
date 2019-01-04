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
                                <h1 class="h3 font-w700 mt-30 mb-10">{{ __('Cadastro de usuário') }}</h1>
                                <h2 class="h5 font-w400 text-muted mb-0">{{ __('Preencha com seus dados para concluir o cadastro') }}</h2>
                            </div>
                            <!-- END Header -->
                            <div class="py-10">
                                @if (session('status'))
                                    <div class="alert alert-success" role="alert">
                                        {{ session('status') }}
                                    </div>
                                @endif
                            </div>

                            <!-- Register Form -->
                            <form class="px-30" method="POST" action="{{ route('register') }}">
                                @csrf
                                {{-- Primeiro Nome --}}
                                <div class="form-group row">
                                    <div class="col-12">
                                        <div class="form-material floating">
                                            <input id="first_name" type="text" class="form-control{{ $errors->has('first_name') ? ' is-invalid' : '' }}" name="first_name" value="{{ old('first_name') }}">
                                            <label for="first_name">{{ __('Primeiro Nome*') }}</label>
                                            @if ($errors->has('first_name'))
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->first('first_name') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                {{-- Sobrenome --}}
                                <div class="form-group row">
                                    <div class="col-12">
                                        <div class="form-material floating">
                                            <input id="last_name" type="text" class="form-control{{ $errors->has('last_name') ? ' is-invalid' : '' }}" name="last_name" value="{{ old('last_name') }}">
                                            <label for="last_name">{{ __('Sobrenome*') }}</label>
                                            @if ($errors->has('last_name'))
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->first('last_name') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                {{-- User Name --}}
                                <div class="form-group row">
                                    <div class="col-12">
                                        <div class="form-material floating">
                                            <input id="nik_name" type="text" class="form-control{{ $errors->has('nik_name') ? ' is-invalid' : '' }}" name="nik_name" value="{{ old('nik_name') }}" >
                                            <label for="nik_name">{{ __('Usuário (apelido)*') }}</label>
                                            @if ($errors->has('nik_name'))
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->first('nik_name') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                {{-- Email --}}
                                <div class="form-group row">
                                    <div class="col-12">
                                        <div class="form-material floating">
                                            <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" value="{{ old('email') }}" name="email" >
                                            <label for="login-email">{{ __('E-mail*') }}</label>        
                                            @if ($errors->has('email'))
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->first('email') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                {{-- Password --}}
                                <div class="form-group row">
                                    <div class="col-12">
                                        <div class="form-material floating">
                                            <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" value="{{ old('password') }}" name="password" >
                                            <label for="login-password">{{ __('Digite uma senha*') }}</label>        
                                            @if ($errors->has('password'))
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->first('password') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                {{--  Re-Password  --}}
                                <div class="form-group row">
                                    <div class="col-12">
                                        <div class="form-material floating">
                                            <input id="password-confirm" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password_confirmation" >
                                            <label for="login-password">{{ __('Repita a mesma senha*') }}</label> 
                                        </div>
                                    </div>
                                </div>
                                {{-- Terms & Conditions --}}
                                <div class="form-group row">
                                    <div class="col-12">
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input {{ $errors->has('signup-terms') ? ' is-invalid' : '' }}" id="signup-terms" name="signup-terms" {{ old('signup-terms') ? 'checked' : '' }}>
                                            <label class="custom-control-label" for="signup-terms">{{ __('Aceito os termos e condições de uso *') }}</label>
                                            @if ($errors->has('signup-terms'))
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->first('signup-terms') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-sm btn-hero btn-alt-success">
                                        <i class="si si-plus mr-10"></i> {{ __('Register') }}
                                    </button>
                                    <div class="mt-30">
                                        <a class="link-effect text-muted mr-10 mb-5 d-inline-block" href="#" data-toggle="modal" data-target="#modal-terms">
                                            <i class="fa fa-book text-muted mr-5"></i> {{ __('Ler os termos de uso') }}
                                        </a>
                                        <a class="link-effect text-muted mr-10 mb-5 d-inline-block" href="{{ route('login') }}">
                                            <i class="fa fa-user text-muted mr-5"></i> {{ __('Tenho Cadastro') }}
                                        </a>
                                    </div>
                                </div>
                            </form>
                            <!-- END Sign In Form -->
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
    {{--  @asset('assets/js/core/jquery.appear.min.js')  --}}
    
    <!-- Codebase Core JS -->
    <script src="assets/js/core/jquery.min.js"></script>
    <script src="assets/js/core/bootstrap.bundle.min.js"></script>
    <script src="assets/js/core/jquery.slimscroll.min.js"></script>
    <script src="assets/js/core/jquery.scrollLock.min.js"></script>
    <script src="assets/js/core/jquery.appear.min.js"></script>
    <script src="assets/js/core/jquery.countTo.min.js"></script>
    <script src="assets/js/core/js.cookie.min.js"></script>
    <script src="assets/js/codebase.js"></script>

    <!-- Page JS Plugins -->
    <script src="assets/js/plugins/jquery-validation/jquery.validate.min.js"></script>

    <!-- Page JS Code -->
    <script src="assets/js/pages/op_auth_signup.js"></script>


@endpush
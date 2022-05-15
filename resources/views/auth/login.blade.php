@extends('layouts.app')

@section('content')
    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Login') }}</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('login') }}">
                            @csrf

                            <div class="form-group row">
                                <label for="email"
                                    class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                                <div class="col-md-6">
                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                                        name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="password"
                                    class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                                <div class="col-md-6">
                                    <input id="password" type="password"
                                        class="form-control @error('password') is-invalid @enderror" name="password"
                                        required autocomplete="current-password" spellcheck="false">

                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror

                                </div>
                            </div>

                            <div class="form-group row" style="margin-top:-10px;margin-bottom:30px;">
                                <label class="col-md-4 col-form-label text-md-right">
                                    <i class="fa fa-toggle-off" title="show password" style="
                                            margin-bottom: 20px;
                                            font-size: .9rem;
                                            ">
                                        <span style="font-weight: normal;
                                    color: #212529;
                                    font-family: Nunito, sans-serif;"> Show Password </span>
                                    </i>

                                    <i class="fa fa-toggle-on" title="hide password" style="
                                            display:none;
                                            margin-bottom: 20px;
                                            font-size: .9rem;
                                            ">
                                        <span style="font-weight: normal;
                                    color: #212529;
                                    font-family: Nunito, sans-serif;"> Show Password </span>
                                    </i>

                                    <script>
                                        $(document).ready(function() {
                                            $(".fa-toggle-off").click(function() {
                                                // $(this).toggleClass("fa-eye fa-eye-slash");
                                                $(".fa-toggle-on").show();
                                                $(".fa-toggle-off").hide();
                                                $('#password').attr('type', 'text');
                                            });
                                            $(".fa-toggle-on").click(function() {
                                                $(".fa-toggle-off").show();
                                                $(".fa-toggle-on").hide();
                                                $('#password').attr('type', 'password');
                                            });
                                        });
                                    </script>
                            </div>

                            <div class="form-group row mb-0" style="margin-top:-40px;">
                                <div class="col-md-8 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        Login
                                    </button>

                                    @if (Route::has('password.request'))
                                        <a class="btn btn-link" href="{{ route('password.request') }}">
                                            Forgot Your Password?
                                        </a>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-8 offset-md-4">
                                    <p style="margin-top: 10px;">
                                        Not Have An Account?
                                        <a class="btn btn-primary" href="register">Register</a>
                                    </p>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

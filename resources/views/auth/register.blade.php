@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Register') }}</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('register') }}">
                            @csrf

                            <div class="form-group row">
                                <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                                <div class="col-md-6">
                                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror"
                                        name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="address"
                                    class="col-md-4 col-form-label text-md-right">{{ __('Address') }}</label>

                                <div class="col-md-6">
                                    <input id="address" type="text"
                                        class="form-control @error('address') is-invalid @enderror" name="address"
                                        value="{{ old('address') }}" required autocomplete="address" autofocus>

                                    @error('address')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="contact"
                                    class="col-md-4 col-form-label text-md-right">{{ __('Contact') }}</label>

                                <div class="col-md-6">
                                    <input id="contact" type="text"
                                        class="form-control @error('contact') is-invalid @enderror" name="contact"
                                        value="{{ old('contact') }}" required autocomplete="contact" autofocus>

                                    @error('contact')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="email"
                                    class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                                <div class="col-md-6">
                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                                        name="email" value="{{ old('email') }}" required autocomplete="email">

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
                                        required autocomplete="new-password" spellcheck="false">

                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror

                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="password-confirm"
                                    class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                                <div class="col-md-6">
                                    <input id="password-confirm" type="password" class="form-control"
                                        name="password_confirmation" required autocomplete="new-password"
                                        spellcheck="false">

                                    {{-- <i class="fas fa-eye" title="show password" style="
                                    float: right;
                                    margin-top: -25px;
                                    right: 15px;
                                    position: relative;
                                    z-index: 2;
                                    "></i>
                                    <i class="fas fa-eye-slash" title="hide password" style="
                                    float: right;
                                    margin-top: -25px;
                                    right: 15px;
                                    position: relative;
                                    z-index: 2;
                                    display:none;
                                    "></i>
                                    <script>
                                        $(document).ready(function() {
                                            $(".fa-eye").click(function() {
                                                // $(this).toggleClass("fa-eye fa-eye-slash");
                                                $(".fa-eye-slash").show();
                                                $(".fa-eye").hide();
                                                $('#password-confirm').attr('type', 'text');
                                            });
                                            $(".fa-eye-slash").click(function() {
                                                $(".fa-eye").show();
                                                $(".fa-eye-slash").hide();
                                                $('#password-confirm').attr('type', 'password');
                                            });
                                        });
                                    </script> --}}

                                </div>
                            </div>

                            <div class="form-group row mb-0">

                                {{-- <label class="col-md-4 col-form-label text-md-right">
                                    <input type="checkbox" id="visibility" onclick="$(this)[0].checked ?
                                                        $('#password').attr('type','text'):
                                                        $('#password').attr('type','password')">
                                    Show Password

                                </label> --}}
                                <label class="col-md-4 col-form-label text-md-right">
                                    <i class="fa fa-toggle-off" title="show password" style="
                                                                                            margin-bottom: 20px;
                                                                                            font-size: .9rem;
                                                                                            ">
                                        <span style="font-weight: normal;
                                                                                    color: #212529;
                                                                                    font-family: Nunito, sans-serif;"> Show
                                            Password
                                        </span>
                                    </i>

                                    <i class="fa fa-toggle-on" title="hide password" style="
                                                                                            display:none;
                                                                                            margin-bottom: 20px;
                                                                                            font-size: .9rem;
                                                                                            ">
                                        <span style="font-weight: normal;
                                                                                    color: #212529;
                                                                                    font-family: Nunito, sans-serif;"> Show
                                            Password
                                        </span>
                                    </i>

                                    <script>
                                        $(document).ready(function() {
                                            $(".fa-toggle-off").click(function() {
                                                // $(this).toggleClass("fa-eye fa-eye-slash");
                                                $(".fa-toggle-on").show();
                                                $(".fa-toggle-off").hide();
                                                $('#password').attr('type', 'text');
                                                $('#password-confirm').attr('type', 'text');
                                            });
                                            $(".fa-toggle-on").click(function() {
                                                $(".fa-toggle-off").show();
                                                $(".fa-toggle-on").hide();
                                                $('#password').attr('type', 'password');
                                                $('#password-confirm').attr('type', 'password');
                                            });
                                        });
                                    </script>

                            </div>

                            <center>
                                <button type="submit" class="btn btn-primary">
                                    Register
                                </button>
                                <span> Have An Account?</span>
                                <a class="btn btn-primary" href="{{ route('login') }}">
                                    Login
                                </a>
                            </center>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@php $title = __('password.title'); @endphp
@extends('layouts.app')

@section('content')
    <header class="masthead bg-primary text-white text-center">
        <div class="container"><img class="img-fluid d-block mx-auto mb-5" src="{{ asset('assets/img/password_reset.svg') }}">
            <h1><strong>Create A New Password</strong></h1>
            <hr class="star-light">
            <h2 class="font-weight-light mb-0">You now need to create a new password to access your account</h2>
        </div>
    </header>
    <section id="login">
        <div class="container">
            <h2 class="text-uppercase text-center text-secondary mb-0"><strong>Reset Password</strong></h2>
            <hr class="star-dark mb-5">
            <div class="row">
                <div class="col-lg-8 mx-auto">
                    <form method="post" id="loginForm" action="{{ route('password.update') }}" class="password_reset" name="sentLogin" novalidate="novalidate">
                        @csrf

                        <input type="hidden" name="token" value="{{ $token }}">
                        
                        <div class="control-group">
                            <div class="form-group floating-label-form-group controls mb-0 pb-2">
                                <label>Email Address</label>
                                <input class="form-control" type="email" name="email" required="" placeholder="Email Address" value="{{ $email ?? old('email') }}" autofocus="" autocomplete="off" id="email">
                                @if ($errors->has('email'))
                                <small class="form-text text-danger help-block">{{ $errors->first('email') }}</small>
                                @endif
                            </div>
                        </div>
                        <div class="control-group">
                            <div class="form-group floating-label-form-group controls mb-0 pb-2">
                                <label>Password</label>
                                <input class="form-control" type="tel" name="password" required="" placeholder="Password" autocomplete="off" id="password">
                                @if ($errors->has('password'))
                                <small class="form-text text-danger help-block">{{ $errors->first('password') }}</small>
                                @endif
                            </div>
                        </div>
                        <div class="control-group">
                            <div class="form-group floating-label-form-group controls mb-0 pb-2">
                                <label>Password Confirmation</label>
                                <input class="form-control" type="tel" name="password_confirmation" required="" placeholder="Password Confirmation" autocomplete="off" id="password">
                                <small class="form-text text-danger help-block"></small>
                            </div>
                        </div>
                        <div class="control-group">
                            <div class="form-check mb-3 mt-3">
                                <input class="form-check-input" type="checkbox" name="remember" value="remember" required="" id="formCheck-1">
                                <label class="form-check-label" for="formCheck-1">Remember-me</label>
                            </div>
                        </div>
                        <div id="success"></div>
                        <div class="form-group mb-3">
                            <button class="btn btn-primary btn-xl" type="submit" id="sendRegisterButton">Reset Password</button>
                        </div>
                    </form>
                    <div class="control-group"></div>
                </div>
            </div>
        </div>
    </section>
@endsection

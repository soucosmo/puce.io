@php $title = __('register.title'); @endphp

@extends('layouts.app')

@section('content')

    <header class="masthead bg-primary text-white text-center">
    <div class="container"><img class="img-fluid d-block mx-auto mb-5" src="{{ asset('assets/img/register.png') }}">
        <h1>{{ __('register.1') }}</h1>
        <hr class="star-light">
        <h2 class="font-weight-light mb-0">{{ __('register.2') }}</h2>
    </div>
    </header>
    <section id="register">
        <div class="container">
            <h2 class="text-uppercase text-center text-secondary mb-0">{{ __('register.3') }}</h2>
            <hr class="star-dark mb-5">
            <div class="row">
                <div class="col-lg-8 mx-auto">
                    <form method="post" id="registerForm" name="sentRegister" novalidate="novalidate">
                        @csrf
                        <div class="control-group">
                            <div class="form-group floating-label-form-group controls mb-0 pb-2">
                                <label>{{ __('register.email') }}</label>
                                <input class="form-control" type="email" name="email" required="" placeholder="{{ __('register.email') }}" autofocus="" autocomplete="off" id="email">
                                @if ($errors->has('email'))
                                <small class="form-text text-danger help-block">{{ $errors->first('email') }}</small>
                                @endif
                            </div>
                        </div>
                        <div class="control-group">
                            <div class="form-group floating-label-form-group controls mb-0 pb-2">
                                <label>{{ __('register.email_confirmation') }}</label>
                                <input class="form-control" type="email" name="email_confirmation" required="" placeholder="{{ __('register.email_confirmation') }}" autocomplete="off" id="email-retype">
                                @if ($errors->has('email_confirmation'))
                                <small class="form-text text-danger help-block">{{ $errors->first('email_confirmation') }}</small>
                                @endif
                            </div>
                        </div>
                        <div class="control-group">
                            <div class="form-group floating-label-form-group controls mb-0 pb-2">
                                <label>{{ __('register.password') }}</label>
                                <input class="form-control" type="password" name="password" required="" placeholder="{{ __('register.password') }}" autocomplete="off" id="password">
                                @if ($errors->has('password'))
                                <small class="form-text text-danger help-block">{{ $errors->first('password') }}</small>
                                @endif
                            </div>
                        </div>
                        <div class="control-group">
                            <div class="form-group floating-label-form-group controls mb-0 pb-2">
                                <label>{{ __('register.password_confirmation') }}</label>
                                <input class="form-control" type="password" name="password_confirmation" required="" placeholder="{{ __('register.password_confirmation') }}" autocomplete="off" id="password_confirmation">
                                @if ($errors->has('password_confirmation'))
                                <small class="form-text text-danger help-block">{{ $errors->first('password_confirmation') }}</small>
                                @endif
                            </div>
                        </div>
                        <div class="control-group">
                            <div class="form-group floating-label-form-group controls mb-3 pb-2">
                                <label>{{ __('register.pin') }}</label>
                                <input class="form-control" type="text" name="pin" required="" placeholder="{{ __('register.pin') }}" autocomplete="off" id="pin">
                                @if ($errors->has('pin'))
                                <small class="form-text text-danger help-block">{{ $errors->first('pin') }}</small>
                                @endif
                            </div>
                        </div>
                        <div class="control-group">
                            <div class="form-check mb-3">
                                <input class="form-check-input" type="checkbox" required="" id="formCheck-1" required="">
                                <label class="form-check-label" for="formCheck-1">{{ __('register.4') }}&nbsp;<a href="./terms_of_use.html">{{ __('register.5') }}</a></label>
                            </div>
                        </div>
                        <div id="success"></div>
                        <div class="form-group">
                            <button class="btn btn-primary btn-xl register" type="submit" id="sendRegisterButton">{{ __('register.6') }}</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>

@endsection
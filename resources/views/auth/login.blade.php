@php $title = __('login.title'); @endphp
@extends('layouts.app')

@section('content')

    <header class="masthead bg-primary text-white text-center">
        <div class="container">
            <img class="img-fluid d-block mx-auto mb-5" src="{{ asset('assets/img/login.png') }}">
            <h1>{{ __('login.string1') }}</h1>
            <hr class="star-light">
            <h2 class="font-weight-light mb-0">{{ __('login.string2') }}</h2>
        </div>
    </header>
    <section id="login">
        <div class="container">
            <h2 class="text-uppercase text-center text-secondary mb-0">{{ __('login.string3') }}</h2>
            <hr class="star-dark mb-5">
            <div class="row">
                <div class="col-lg-8 mx-auto">
                    <form method="post" id="loginForm" class="login" name="sentLogin" novalidate="novalidate">
                        @csrf
                        <div class="control-group">
                            <div class="form-group floating-label-form-group controls mb-0 pb-2">
                                <label>{{ __('login.email') }}</label>
                                <input class="form-control" type="email" name="email" required="" placeholder="{{ __('login.email') }}" autofocus="" autocomplete="off" id="email">
                                @if ($errors->has('email'))
                                <small class="form-text text-danger help-block">{{ $errors->first('email') }}</small>
                                @endif
                            </div>
                        </div>
                        <div class="control-group">
                            <div class="form-group floating-label-form-group controls mb-0 pb-2">
                                <label>{{ __('login.password') }}</label>
                                <input class="form-control" type="tel" name="password" required="" placeholder="{{ __('login.password') }}" autocomplete="off" id="password">
                                @if ($errors->has('password'))
                                <small class="form-text text-danger help-block">{{ $errors->first('password') }}</small>
                                @endif
                            </div>
                        </div>
                        <div class="control-group">
                            <div class="form-check mb-3 mt-3">
                                <input class="form-check-input" type="checkbox" name="remember" value="remember" required="" id="formCheck-1" {{ old('remember') ? 'checked' : '' }}>
                                <label class="form-check-label" for="formCheck-1">{{ __('login.remember') }}</label>
                            </div>
                        </div>
                        <div class="form-group mb-3">
                            <button class="btn btn-primary btn-xl" type="submit" id="sendRegisterButton">{{ __('login.access') }}</button>
                        </div>
                    </form>
                    <div class="control-group">
                        <p class="mb-0">{{ __('login.string4') }}&nbsp;<a href="{{ route('register') }}"><span style="text-decoration: underline;">{{ __('login.string5') }}</span><br></a></p>
                        <p>{{ __('login.string6') }}&nbsp;<a href="{{ route('password.request') }}"><span style="text-decoration: underline;">{{ __('login.string7') }}</span><br></a></p>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection

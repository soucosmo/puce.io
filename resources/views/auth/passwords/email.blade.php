@php $title = __('password.title'); @endphp

@extends('layouts.app')

@section('content')
    <header class="masthead bg-primary text-white text-center">
        <div class="container"><img class="img-fluid d-block mx-auto mb-5" src="{{ asset('assets/img/password_mail.svg') }}">
            <h1><strong>Forgot Your Password?</strong></h1>
            <hr class="star-light">
            <h2 class="font-weight-light mb-0">Having Trouble Remembering Your Password? Recover Now.</h2>
        </div>
    </header>
    <section id="login">
        <div class="container">
            <h2 class="text-uppercase text-center text-secondary mb-0"><strong>Reset Password</strong></h2>
            <hr class="star-dark mb-5">
            <div class="row">
                <div class="col-lg-8 mx-auto">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif

                    <form action="{{ route('password.email') }}" method="post" id="loginForm" class="password_email" name="sentLogin" novalidate="novalidate">
                        @csrf
                        
                        <div class="control-group">
                            <div class="form-group floating-label-form-group controls mb-3 pb-2">
                                <label>Email Address</label>
                                <input class="form-control" type="email" name="email" value="{{ old('email') }}" required="" placeholder="Email Address" autofocus="" autocomplete="off" id="email">
                                @if ($errors->has('email'))
                                <small class="form-text text-danger help-block">{{ $errors->first('email') }}</small>
                                @endif
                            </div>
                        </div>
                        <div class="control-group"></div>
                        <div id="success"></div>
                        <div class="form-group">
                            <button class="btn btn-primary btn-xl" type="submit" id="sendPasswordResetButton">Send Password Reset Link</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection
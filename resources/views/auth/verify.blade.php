@php $title = __('verify.title'); @endphp
@extends('layouts.app')

@section('content')
    <header class="masthead bg-primary text-white text-center">
        <div class="container">
            <img class="img-fluid d-block mx-auto mb-5" src="{{ asset('assets/img/email.png') }}">
            <h1><strong>{{ __('verify.string1') }}</strong></h1>
            <hr class="star-light">
            <h2 class="font-weight-light mb-0">{{ __('verify.string2') }}</h2>
        </div>
    </header>
    <section id="login">
        <div class="container">
            <h2 class="text-uppercase text-center text-secondary mb-0"><strong>{{ __('verify.string3') }}</strong></h2>
            <hr class="star-dark mb-5">
            <div class="row">
                <div class="col-lg-8 mx-auto">
                    <h5 class="text-center"><strong>If you did not receive the email&nbsp;</strong>
                        <a href="{{ route('verification.resend') }}"><strong>click here to request another</strong></a>
                    </h5>
                    @if (session('resent'))
                        <div class="alert alert-success" role="alert">
                            {{ __('A fresh verification link has been sent to your email address.') }}
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </section>
@endsection
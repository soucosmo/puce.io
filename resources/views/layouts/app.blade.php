<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>{{ $title }}</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="{{ asset('assets/bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat:400,700">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato:400,700,400italic,700italic">
    <link rel="stylesheet" href="{{ asset('assets/fonts/fontawesome-all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/fonts/font-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/Brands.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/custom.css') }}">
</head>

<body id="page-top">
    <nav class="navbar navbar-light navbar-expand-lg fixed-top bg-secondary text-uppercase" id="mainNav">
        <div class="container">
            <a class="navbar-brand js-scroll-trigger" href="#page-top"><img src="{{ asset('assets/img/logo.svg') }}"></a>
            <button class="navbar-toggler navbar-toggler-right text-uppercase bg-primary text-white rounded" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive"
                aria-expanded="false" aria-label="Toggle navigation"><i class="fa fa-bars"></i></button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="nav navbar-nav ml-auto">
                    @guest

                    <li class="nav-item mx-0 mx-lg-1" role="presentation">
                        <a class="nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger" href="{{ Route('home') }}">{{ __('menu.home') }}</a>
                    </li>
                    <li class="nav-item mx-0 mx-lg-1" role="presentation">
                        <a class="nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger" href="{{ Route('documentation') }}">{{ __('menu.documentation') }}</a>
                    </li>
                    <li class="nav-item mx-0 mx-lg-1" role="presentation">
                        <a class="nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger" href="{{ Route('login') }}">{{ __('menu.login') }}</a>
                    </li>
                    <li class="nav-item mx-0 mx-lg-1" role="presentation">
                        <a class="nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger" href="{{ Route('register') }}">{{ __('menu.register') }}</a>
                    </li>

                    @else

                    <li class="nav-item mx-0 mx-lg-1" role="presentation">
                        <a class="nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger" href="{{ Route('dashboard') }}">{{ __('menu.dashboard') }}</a>
                    </li>
                    <li class="nav-item mx-0 mx-lg-1" role="presentation">
                        <a class="nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger" href="{{ Route('documentation') }}">{{ __('menu.documentation') }}</a>
                    </li>
                    <li class="nav-item mx-0 mx-lg-1" role="presentation">
                        <a class="nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger" href="{{ Route('settings') }}">{{ __('menu.settings') }}</a>
                    </li>
                    <li class="nav-item mx-0 mx-lg-1" role="presentation">
                        <a class="nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger" href="{{ Route('logout') }}"><i class="fas fa-sign-out-alt"></i></a>
                    </li>

                    @endguest
                </ul>
            </div>
        </div>
    </nav>
    
    @yield('content')

    <footer class="footer text-center">
        <div class="container">
            <div class="row">
                <div class="col-md-4 mb-5 mb-lg-0">
                    <h4 class="text-uppercase mb-4">{{ __('footer.title_navegation') }}</h4>
                    <ul class="list-unstyled">

                        @guest
                        <li>
                            <a href="{{ Route('home') }}" class="text-light">{{ __('footer.home_page') }}</a>
                        </li>
                        <li>
                            <a href="{{ Route('password.request') }}" class="text-light">{{ __('footer.recover_passowrd') }}<br></a>
                        </li>
                        @if (false)                        
                        <li>
                            <a href="{{ Route('reset.google') }}" class="text-light">{{ __('footer.reset_google') }}</a>
                        </li>
                        @endif
                        <li>
                            <a href="{{ Route('login') }}" class="text-light">{{ __('menu.login') }}</a>
                        </li>
                        
                        <li>
                            <a href="{{ Route('register') }}" class="text-light">{{ __('menu.register') }}</a>
                        </li>
                        @else

                         <li>
                            <a class="text-light" href="{{ Route('dashboard') }}">{{ __('menu.dashboard') }}</a>
                        </li>
                        <li>
                            <a class="text-light" href="{{ Route('documentation') }}">{{ __('menu.documentation') }}</a>
                        </li>
                        <li>
                            <a class="text-light" href="{{ Route('settings') }}">{{ __('menu.settings') }}</a>
                        </li>
                        <li>
                            <a class="text-light" href="{{ Route('logout') }}"><i class="fas fa-sign-out-alt"></i></a>
                        </li>

                        @endguest
                    </ul>
                </div>
                <div class="col-md-4 mb-5 mb-lg-0">
                    <h4 class="text-uppercase mb-4">{{ __('footer.title_services') }}</h4>
                    <ul class="list-unstyled">
                        <li><a href="{{ Route('affiliate.program') }}" class="text-light">{{ __('footer.affiliate_program') }}</a></li>
                        <li><a href="{{ Route('prices_and_rates') }}" class="text-light">{{ __('footer.prices_and_rates') }}</a></li>
                        <li><a href="{{ Route('documentation') }}" class="text-light">{{ __('menu.documentation') }}</a></li>
                        <li><a href="{{ Route('privacy') }}" class="text-light">{{ __('footer.privacy_policy') }}</a></li>
                        <li><a href="{{ Route('terms') }}" class="text-light">{{ __('footer.terms_of_use') }}</a></li>
                    </ul>
                </div>
                <div class="col-md-4">
                    <h4 class="text-uppercase mb-4">{{ __('footer.about') }}</h4>
                    <p class="text-light">{{ __('footer.about_desc') }}</p>
                    <p class="lead mb-0"></p>
                </div>
            </div>
        </div>
    </footer>
    <div class="copyright py-4 text-center text-white">
        <div class="container"><small>Copyright ©&nbsp;Puce.io 2018</small></div>
    </div>
    <div class="d-lg-none scroll-to-top position-fixed rounded"><a class="d-block js-scroll-trigger text-center text-white rounded" href="#page-top"><i class="fa fa-chevron-up"></i></a></div>
    <div class="modal text-center" role="dialog" tabindex="-1" id="portfolio-modal-1">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header"><button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button></div>
                <div class="modal-body">
                    <div class="container text-center">
                        <div class="row">
                            <div class="col-lg-8 mx-auto">
                                <h2 class="text-uppercase text-secondary mb-0">{{ __('home.modal_1_title') }}</h2>
                                <hr class="star-dark mb-5"><img class="img-fluid mb-5" src="{{ asset('assets/img/transfer.svg') }}">
                                <p class="mb-0">{{ __('home.modal_1_desc') }}</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer pb-5"></div>
            </div>
        </div>
    </div>
    <div class="modal text-center" role="dialog" tabindex="-1" id="portfolio-modal-2">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header"><button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button></div>
                <div class="modal-body">
                    <div class="container text-center">
                        <div class="row">
                            <div class="col-lg-8 mx-auto">
                                <h2 class="text-uppercase text-secondary mb-0">{{ __('home.modal_2_title') }}</h2>
                                <hr class="star-dark mb-5"><img class="img-fluid mb-5" src="{{ asset('assets/img/mobile.svg') }}">
                                <p class="mb-0">{{ __('home.modal_2_desc') }}</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer pb-5"></div>
            </div>
        </div>
    </div>
    <div class="modal text-center" role="dialog" tabindex="-1" id="portfolio-modal-3">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header"><button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button></div>
                <div class="modal-body">
                    <div class="container text-center">
                        <div class="row">
                            <div class="col-lg-8 mx-auto">
                                <h2 class="text-uppercase text-secondary mb-0">{{ __('home.modal_3_title') }}</h2>
                                <hr class="star-dark mb-5"><img class="img-fluid mb-5" src="{{ asset('assets/img/altcoins.svg') }}">
                                <p class="mb-0">{{ __('home.modal_3_desc') }}</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer pb-5"></div>
            </div>
        </div>
    </div>
    <div class="modal text-center" role="dialog" tabindex="-1" id="portfolio-modal-4">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header"><button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button></div>
                <div class="modal-body">
                    <div class="container text-center">
                        <div class="row">
                            <div class="col-lg-8 mx-auto">
                                <h2 class="text-uppercase text-secondary mb-0">{{ __('home.modal_4_title') }}</h2>
                                <hr class="star-dark mb-5"><img class="img-fluid mb-5" src="{{ asset('assets/img/portfolio/game.png') }}">
                                <p class="mb-0">{{ __('home.modal_4_desc') }}</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer pb-5"></div>
            </div>
        </div>
    </div>
    <div class="modal text-center" role="dialog" tabindex="-1" id="portfolio-modal-5">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header"><button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button></div>
                <div class="modal-body">
                    <div class="container text-center">
                        <div class="row">
                            <div class="col-lg-8 mx-auto">
                                <h2 class="text-uppercase text-secondary mb-0">{{ __('home.modal_5_title') }}</h2>
                                <hr class="star-dark mb-5"><img class="img-fluid mb-5" src="{{ asset('assets/img/portfolio/safe.png') }}">
                                <p class="mb-0">{{ __('home.modal_5_desc') }}</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer pb-5"></div>
            </div>
        </div>
    </div>
    <div class="modal text-center" role="dialog" tabindex="-1" id="portfolio-modal-6">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header"><button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button></div>
                <div class="modal-body">
                    <div class="container text-center">
                        <div class="row">
                            <div class="col-lg-8 mx-auto">
                                <h2 class="text-uppercase text-secondary mb-0">{{ __('home.modal_6_title') }}</h2>
                                <hr class="star-dark mb-5"><img class="img-fluid mb-5" src="{{ asset('assets/img/affiliate.svg') }}">
                                <p class="mb-0">{{ __('home.modal_6_desc') }}</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer pb-5"></div>
            </div>
        </div>
    </div>
    <script src="{{ asset('assets/js/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/bootstrap/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('assets/js/smart-forms.min.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.min.js"></script>
    <script src="{{ asset('assets/js/freelancer.js') }}"></script>
    <script src="{{ asset('assets/js/alertify.js') }}"></script>
    <script src="{{ asset('assets/js/custom.js') }}"></script>
    <script src="{{ asset('assets/js/settings.js') }}"></script>
</body>

</html>
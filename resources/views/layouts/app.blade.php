<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Puce.io | Send and receive multi-currency payments in a simple way</title>
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
            <a class="navbar-brand js-scroll-trigger" href="#page-top">Puce.io</a>
            <button class="navbar-toggler navbar-toggler-right text-uppercase bg-primary text-white rounded" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive"
                aria-expanded="false" aria-label="Toggle navigation"><i class="fa fa-bars"></i></button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="nav navbar-nav ml-auto">

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
                </ul>
            </div>
        </div>
    </nav>
    <header class="masthead bg-primary text-white text-center">
        <div class="container"><img class="img-fluid d-block mx-auto mb-5" src="assets/img/home.svg">
            <h1><strong>{{ __('home.background_title') }}</strong></h1>
            <hr class="star-light">
            <h2 class="font-weight-light mb-0">{{ __('home.background_description') }}</h2>
        </div>
    </header>
    <section id="portfolio" class="portfolio">
        <div class="container">
            <h2 class="text-uppercase text-center text-secondary">{{ __('home.about_us') }}</h2>
            <hr class="star-dark mb-5">
            <div class="row">
                <div class="col-md-6 col-lg-4">
                    <a class="d-block mx-auto portfolio-item" href="#portfolio-modal-1" data-toggle="modal">
                        <div class="d-flex portfolio-item-caption position-absolute h-100 w-100">
                            <div class="my-auto portfolio-item-caption-content w-100 text-center text-white"><i class="fa fa-search-plus fa-3x"></i></div>
                        </div>
                        <img class="img-fluid" src="{{ asset('assets/img/transfer.svg') }}">
                    </a>
                </div>
                <div class="col-md-6 col-lg-4">
                    <a class="d-block mx-auto portfolio-item" href="#portfolio-modal-2" data-toggle="modal">
                        <div class="d-flex portfolio-item-caption position-absolute h-100 w-100">
                            <div class="my-auto portfolio-item-caption-content w-100 text-center text-white"><i class="fa fa-search-plus fa-3x"></i></div>
                        </div>
                        <img class="img-fluid" src="{{ asset('assets/img/mobile.svg') }}">
                    </a>
                </div>
                <div class="col-md-6 col-lg-4">
                    <a class="d-block mx-auto portfolio-item" href="#portfolio-modal-3" data-toggle="modal">
                        <div class="d-flex portfolio-item-caption position-absolute h-100 w-100">
                            <div class="my-auto portfolio-item-caption-content w-100 text-center text-white"><i class="fa fa-search-plus fa-3x"></i></div>
                        </div>
                        <img class="img-fluid" src="{{ asset('assets/img/altcoins.svg') }}">
                    </a>
                </div>
                <div class="col-md-6 col-lg-4">
                    <a class="d-block mx-auto portfolio-item" href="#portfolio-modal-4" data-toggle="modal">
                        <div class="d-flex portfolio-item-caption position-absolute h-100 w-100">
                            <div class="my-auto portfolio-item-caption-content w-100 text-center text-white"><i class="fa fa-search-plus fa-3x"></i></div>
                        </div>
                        <img class="img-fluid" src="{{ asset('assets/img/portfolio/game.png') }}">
                    </a>
                </div>
                <div class="col-md-6 col-lg-4">
                    <a class="d-block mx-auto portfolio-item" href="#portfolio-modal-5" data-toggle="modal">
                        <div class="d-flex portfolio-item-caption position-absolute h-100 w-100">
                            <div class="my-auto portfolio-item-caption-content w-100 text-center text-white"><i class="fa fa-search-plus fa-3x"></i></div>
                        </div>
                        <img class="img-fluid" src="{{ asset('assets/img/portfolio/safe.png') }}">
                    </a>
                </div>
                <div class="col-md-6 col-lg-4">
                    <a class="d-block mx-auto portfolio-item" href="#portfolio-modal-6" data-toggle="modal">
                        <div class="d-flex portfolio-item-caption position-absolute h-100 w-100">
                            <div class="my-auto portfolio-item-caption-content w-100 text-center text-white"><i class="fa fa-search-plus fa-3x"></i></div>
                        </div>
                        <img class="img-fluid" src="{{ asset('assets/img/affiliate.svg') }}">
                    </a>
                </div>
            </div>
        </div>
    </section>
    <section id="about" class="bg-primary text-white mb-0">
        <div class="container">
            <h2 class="text-uppercase text-center text-white">{{ __('home.about_title') }}</h2>
            <hr class="star-light mb-5">
            <div class="row">
                <div class="col-lg-4 ml-auto">
                    <p class="lead">{{ __('home.about_left') }}</p>
                </div>
                <div class="col-lg-4 mr-auto">
                    <p class="lead">{{ __('home.about_right') }}</p>
                </div>
            </div>
            <div class="text-center mt-4">
                <a class="btn btn-outline-light btn-xl" role="button" href="{{ Route('documentation') }}"><i class="fas fa-code mr-2"></i>
                    <span>{{ __('menu.documentation') }}</span>
                </a>
            </div>
        </div>
    </section>
    <section id="contact">
        <div class="container">
            <h2 class="text-uppercase text-center text-secondary mb-0">{{ __('home.contact') }}</h2>
            <hr class="star-dark mb-5">
            <div class="row">
                <div class="col-lg-8 mx-auto">
                    <form id="contactForm" name="sentMessage" novalidate="novalidate" data-bss-recipient="66f99c2316dce6ca54faf236e71ff3f6">
                        <div class="control-group">
                            <div class="form-group floating-label-form-group controls mb-0 pb-2">
                                <label>{{ __('home.name') }}</label>
                                <input class="form-control" type="text" required="" placeholder="{{ __('home.name') }}" id="name">
                                <small class="form-text text-danger help-block"></small>
                            </div>
                        </div>
                        <div class="control-group">
                            <div class="form-group floating-label-form-group controls mb-0 pb-2">
                                <label>{{ __('home.email') }}</label>
                                <input class="form-control" type="email" required="" placeholder="{{ __('home.email') }}" id="email">
                                <small class="form-text text-danger help-block"></small>
                            </div>
                        </div>
                        <div class="control-group">
                            <div class="form-group floating-label-form-group controls mb-0 pb-2">
                                <label>{{ __('home.phone') }}</label>
                                <input class="form-control" type="tel" required="" placeholder="{{ __('home.phone') }}" id="phone">
                                <small class="form-text text-danger help-block"></small>
                            </div>
                        </div>
                        <div class="control-group">
                            <div class="form-group floating-label-form-group controls mb-5 pb-2">
                                <label>{{ __('home.message') }}</label>
                                <textarea class="form-control" rows="5" required="" placeholder="{{ __('home.message') }}" id="message"></textarea>
                                <small class="form-text text-danger help-block"></small>
                            </div>
                        </div>
                        <div id="success"></div>
                        <div class="form-group">
                            <button class="btn btn-primary btn-xl" type="submit" id="sendMessageButton">{{ __('home.send') }}</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
    <section id="code" class="bg-primary text-white mb-0">
        <div class="container">
            <h2 class="text-uppercase text-center text-white mb-5"><strong>{{ __('home.api_title') }}</strong><br></h2>
            <div class="row">
                <div class="col-lg-4 col-xl-7 ml-auto bg-light">
                    <div>
                        <ul class="nav nav-tabs card-header">
                            <li class="nav-item"><a class="nav-link active" role="tab" data-toggle="tab" href="#curl">cURL</a></li>
                            <li class="nav-item"><a class="nav-link" role="tab" data-toggle="tab" href="#js">JavaScript</a></li>
                            <li class="nav-item"><a class="nav-link" role="tab" data-toggle="tab" href="#php">PHP</a></li>
                            <li class="nav-item"><a class="nav-link" role="tab" data-toggle="tab" href="#python">Python</a></li>
                        </ul>
                        <div class="tab-content">
                            <div class="tab-pane active text-black-50" role="tabpanel" id="curl">
                                <p class="mb-1">{{ __('home.api_guide') }}</p>
                                <p>&gt;&gt; curl https://puce.io/api/{{ __('home.api_key') }}/address/btc</p>
                                <p class="text-success">{<br>&nbsp; &nbsp; "status":"success",<br>&nbsp; &nbsp; "data":{<br>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; "coin":"btc",<br>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                                    "address":"3PzB3VHsik7KfEda6h3LLdw8b81HFGtLAd"<br>&nbsp; &nbsp; }<br>}</p>
                            </div>
                            <div class="tab-pane text-black-50" role="tabpanel" id="js">
                                <p class="mb-1">{{ __('home.api_guide') }}</p>
                                <p>&gt;&gt; Puce.address('btc');</p>
                                <p class="text-success">{<br>&nbsp; &nbsp; "status":"success",<br>&nbsp; &nbsp; "data":{<br>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; "coin":"btc",<br>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                                    "address":"3PzB3VHsik7KfEda6h3LLdw8b81HFGtLAd"<br>&nbsp; &nbsp; }<br>}</p>
                            </div>
                            <div class="tab-pane text-black-50" role="tabpanel" id="php">
                                <p class="mb-1">{{ __('home.api_guide') }}</p>
                                <p>&gt;&gt; $Puce-&gt;address('btc');</p>
                                <p class="text-success">{<br>&nbsp; &nbsp; "status":"success",<br>&nbsp; &nbsp; "data":{<br>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; "coin":"btc",<br>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                                    "address":"3PzB3VHsik7KfEda6h3LLdw8b81HFGtLAd"<br>&nbsp; &nbsp; }<br>}</p>
                            </div>
                            <div class="tab-pane text-black-50" role="tabpanel" id="python">
                                <p class="mb-1">{{ __('home.api_guide') }}</p>
                                <p>&gt;&gt; Puce.address('btc');</p>
                                <p class="text-success">{<br>&nbsp; &nbsp; "status":"success",<br>&nbsp; &nbsp; "data":{<br>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; "coin":"btc",<br>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                                    "address":"3PzB3VHsik7KfEda6h3LLdw8b81HFGtLAd"<br>&nbsp; &nbsp; }<br>}</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 mr-auto">
                    <h4 class="text-uppercase text-center text-white mb-2"><strong>{{ __('home.api_diversity') }}</strong><br></h4>
                    <ul>
                        <li>{{ __('home.account_creation') }}</li>
                        <li>{{ __('home.account_change') }}</li>
                        <li>{{ __('home.balance_transfers') }}</li>
                        <li>{{ __('home.creating_addresses') }}</li>
                        <li>{{ __('home.quick_notifications') }}</li>
                        <li>{{ __('home.transaction_query') }}</li>
                        <li>{{ __('home.withdrawal_of_fundos') }}</li>
                    </ul><a class="btn btn-outline-light ml-3" role="button" href="{{ Route('documentation') }}">{{ __('home.button') }}</a></div>
            </div>
        </div>
    </section>
    <footer class="footer text-center">
        <div class="container">
            <div class="row">
                <div class="col-md-4 mb-5 mb-lg-0">
                    <h4 class="text-uppercase mb-4">{{ __('footer.title_navegation') }}</h4>
                    <ul class="list-unstyled">

                        <li>
                            <a href="{{ Route('home') }}" class="text-light">{{ __('footer.home_page') }}</a>
                        </li>
                        <li>
                            <a href="{{ Route('password.email') }}" class="text-light">{{ __('footer.recover_passowrd') }}<br></a>
                        </li>
                        <li>
                            <a href="{{ Route('reset.google') }}" class="text-light">{{ __('footer.reset_google') }}</a>
                        </li>
                        <li>
                            <a href="{{ Route('login') }}" class="text-light">{{ __('menu.login') }}</a>
                        </li>
                        
                        <li>
                            <a href="{{ Route('register') }}" class="text-light">{{ __('menu.register') }}</a>
                        </li>
                    </ul>
                </div>
                <div class="col-md-4 mb-5 mb-lg-0">
                    <h4 class="text-uppercase mb-4">{{ __('footer.title_services') }}</h4>
                    <ul class="list-unstyled">
                        <li></li>
                        <li></li>
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
                                <h2 class="text-uppercase text-secondary mb-0">envios internos</h2>
                                <hr class="star-dark mb-5"><img class="img-fluid mb-5" src="assets/img/transfer.svg">
                                <p class="mb-0">Envie e receba pagamentos para outros usuários Puce.io sem taxas, as transferências são instantâneas e totalmente transparentes, você pode enviar e receber qualquer valor, não existe um limite mínimo.</p>
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
                                <h2 class="text-uppercase text-secondary mb-0">baixe nosso aplicativo</h2>
                                <hr class="star-dark mb-5"><img class="img-fluid mb-5" src="assets/img/mobile.svg">
                                <p class="mb-0">Todos os nossos serviços também estão disponíveis no nosso aplicativo para Android e iOS, o seu dinheiro sempre vai estar na palma da mão, e o melhor, com atualizações frequentes.</p>
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
                                <h2 class="text-uppercase text-secondary mb-0">infinidade de moedas</h2>
                                <hr class="star-dark mb-5"><img class="img-fluid mb-5" src="assets/img/altcoins.svg">
                                <p class="mb-0">Nosso foco é trazer diariamente novas moedas, para uso em geral, seja você um usuário de carteira ou um desenvolvedor, faremos o possível para suprir suas nocessidades em ambos os perfis.</p>
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
                                <h2 class="text-uppercase text-secondary mb-0">Aplicações em jogos</h2>
                                <hr class="star-dark mb-5"><img class="img-fluid mb-5" src="assets/img/portfolio/game.png">
                                <p class="mb-0">Receba pagamentos e depositos nos seus jogos ou aplicativos, crei e altere contas para seus usuários, gere endereços de depositos, processe pedidos de saques, consulte saldos, e muito mais.</p>
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
                                <h2 class="text-uppercase text-secondary mb-0">Cofre frio</h2>
                                <hr class="star-dark mb-5"><img class="img-fluid mb-5" src="assets/img/portfolio/safe.png">
                                <p class="mb-0">A maior parte de nossas moedas ficam armazenadas em um local protegido e sem conexão com a internet para garantir a segurança, periodicamente trocamos nossa criptografia para tornar o sistema inviolável, evitando qualquer
                                    atividade não autorizada.</p>
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
                                <h2 class="text-uppercase text-secondary mb-0">programa de afiliados</h2>
                                <hr class="star-dark mb-5"><img class="img-fluid mb-5" src="assets/img/affiliate.svg">
                                <p class="mb-0">Você pode lucrar convidando os seus amigos usando o seu link de convite, você pode convidar quantos amigos quiser, &nbsp;você e seus amigos vão adorar, é tudo de bom, divirta-se!</p>
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
</body>

</html>
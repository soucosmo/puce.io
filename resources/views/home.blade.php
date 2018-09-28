@extends('layouts.app')

@section('content')

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

@endsection
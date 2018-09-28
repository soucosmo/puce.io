                                <div class="tab-pane fade text-black-50 show active p-3" role="tabpanel" id="wallet">
                                    <div class="row">
                                        <div class="col-xl-4">
                                            <img src="assets/img/qrcode.png" class="ml-2">
                                        </div>
                                        <div class="col">
                                            <div class="row mt-1 mr-3 ml-3 mb-3">
                                                <div class="col p-2" style="border: 1px solid #888;">
                                                    <h5 class="text-uppercase text-muted">0.00000000 {{ strtoupper($coin['coin']) }}</h5>
                                                    <h6 class="text-muted title-address mb-0">{{ __('dashboard.balance') }}</h6>
                                                </div>
                                            </div>
                                            <div class="row mt-1 mr-3 ml-3 mb-3">
                                                <div class="col p-2" style="border: 1px solid #888;">
                                                    <h6 class="text-muted title-address mb-0">{{ __('dashboard.updated') }}</h6>
                                                    <h5 class="text-uppercase text-muted">2018-05-03 20:05</h5>
                                                </div>
                                            </div>
                                            <div class="row mt-1 mr-3 ml-3 mb-3">
                                                <div class="col p-3" style="border: 1px solid #888;">
                                                    <a class="btn btn-outline-primary btn-lg" role="button" href="#send"><i class="far fa-paper-plane"></i>&nbsp;{{ __('dashboard.button') . ' ' . $coin['name'] }}</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mt-1 mr-3 ml-3 mb-2">
                                        <div class="col p-3 mt-2" style="border: 1px solid #888;">
                                            <h6 class="text-muted title-address">{{ __('dashboard.address') }}</h6>
                                            <input type="text" value="1LPxCYprEXpZYwTCPp19d6AZZD87EYQg5a" readonly="" class="w-100 text-center input-address text-bold copy text-muted">
                                        </div>
                                    </div>
                                    <div class="row mt-1 mr-3 ml-3 mb-2">
                                        <div class="col p-3 mt-2 d-none" style="border: 1px solid #888;">
                                            <h6 class="title-address text-muted">{{ __('dashboard.paymentid') }}</h6>
                                            <input type="text" value="56165165165165165165165165165" readonly="" class="w-100 text-center text-muted input-address text-bold copy">
                                        </div>
                                    </div>
                                </div>
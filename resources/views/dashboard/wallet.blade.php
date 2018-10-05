                                <div class="tab-pane fade text-black-50 show active p-3" role="tabpanel" id="wallet">
                                    <div class="row">
                                        <div class="col-xl-4">
                                            <img src="{{ 'https://chart.googleapis.com/chart?chs=245x245&chld=M|0&cht=qr&chl='.$receive->address }}" class="ml-2">
                                        </div>
                                        <div class="col">
                                            <div class="row mt-1 mr-3 ml-3 mb-3">
                                                <div class="col p-2" style="border: 1px solid #888;">
                                                    <h5 class="text-uppercase text-muted">{{ ($balance->amount ?? '0.00000000'). ' ' . strtoupper($coin['coin']) }}</h5>
                                                    <h6 class="text-muted title-address mb-0">{{ __('dashboard.balance') }}</h6>
                                                </div>
                                            </div>
                                            <div class="row mt-1 mr-3 ml-3 mb-3">
                                                <div class="col p-2" style="border: 1px solid #888;">
                                                    <h6 class="text-muted title-address mb-0">{{ __('dashboard.updated') }}</h6>
                                                    <h5 class="text-uppercase text-muted">{{ $balance->updated ?? date('Y-m-d h:i:s') }}</h5>
                                                </div>
                                            </div>
                                            <div class="row mt-1 mr-3 ml-3 mb-3">
                                                <div class="col p-3" style="border: 1px solid #888;">
                                                    <a class="btn btn-outline-primary btn-lg" href="#send" role="tab" data-toggle="tab"><i class="far fa-paper-plane"></i>&nbsp;{{ __('dashboard.button') . ' ' . $coin['name'] }}</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mt-1 mr-3 ml-3 mb-2">
                                        <div class="col p-3 mt-2" style="border: 1px solid #888;">
                                            <h6 class="text-muted title-address">{{ __('dashboard.address') }}</h6>
                                            <input type="text" value="{{ $receive->address }}" readonly="" class="w-100 text-center input-address text-bold copy text-muted">
                                        </div>
                                    </div>
                                    @if ( $receive->payment_id )
                                    <div class="row mt-1 mr-3 ml-3 mb-2">
                                        <div class="col p-3 mt-2" style="border: 1px solid #888;">
                                            <h6 class="title-address text-muted">{{ __('dashboard.paymentid') }}</h6>
                                            <input type="text" value="{{ $receive->payment_id }}" readonly="" class="w-100 text-center text-muted input-address text-bold copy">
                                        </div>
                                    </div>
                                    @endif
                                </div>
@extends('layouts.app')

@section('content')
	<header class="masthead bg-primary text-white text-center">
        <div class="container">
            <div class="row">
                @includeif ('dashboard.altcoins')
                <div class="col" style="margin-bottom:25px;">
                    <div class="bg-light w-100 h-100">
                        <div>
                            @include ('dashboard.tabs')
                            <div class="tab-content">
                                @include ('dashboard.wallet')
                                
                                @include ('dashboard.addresses')
                                
                                @include ('dashboard.extract')

                                @include ('dashboard.deposits')
                                
                                @include ('dashboard.withdrawals')

                                @include ('dashboard.send')
                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>
@endsection
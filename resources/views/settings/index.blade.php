@extends('layouts.app')

@section('content')

	<header class="masthead bg-primary text-white text-center">
	    <div class="container">
	        <div class="row">
	            
	            @include ('dashboard.altcoins')

	            <div class="col" style="margin-bottom:25px;">
	                <div class="bg-light w-100 h-100">
	                    <div>
	                        @include ('settings.tabs')
	                        <div class="tab-content">

	                        	@include ('settings.email')

	                        @if (Auth::User()->secret)
	                        	@include ('settings.disable_auth')
	                        @else
	                        	@include ('settings.enable_auth')
	                        @endif

	                            @include ('settings.password')
	                            
	                            @include ('settings.pin')
								
								@include ('settings.api')

	                        </div>
	                    </div>
	                </div>
	            </div>
	        </div>
	    </div>
	</header>

@endsection
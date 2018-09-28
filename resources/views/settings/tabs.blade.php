							<ul class="nav nav-tabs card-header">
	                            <li class="nav-item">
	                            	<a class="nav-link text-secondary active" role="tab" data-toggle="tab" href="#change_email">{{ __('settings.email') }}</a>
	                            </li>
	                            <li class="nav-item">
	                            	<a class="nav-link text-secondary" role="tab" data-toggle="tab" href="#change_password">{{ __('settings.password') }}</a>
	                            </li>
	                            <li class="nav-item">
	                            	<a class="nav-link text-secondary" role="tab" data-toggle="tab" href="#change_pin">{{ __('settings.pin') }}</a>
	                            </li>
	                            
	                            <li class="nav-item">
	                            	@if (Auth::User()->secret)
	                            	<a class="nav-link text-secondary" role="tab" data-toggle="tab" href="#disable_auth">{{ __('settings.2fa') }}</a>
	                            	@else
	                            	<a class="nav-link text-secondary" role="tab" data-toggle="tab" href="#enable_auth">{{ __('settings.2fa') }}</a>
	                            	@endif
	                            </li>
	                            <li class="nav-item">
	                            	<a class="nav-link text-secondary" role="tab" data-toggle="tab" href="#api">{{ __('settings.api') }}</a>
	                            </li>
	                        </ul>
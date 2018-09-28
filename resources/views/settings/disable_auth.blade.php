								<div class="tab-pane fade text-black-50 p-3" role="tabpanel" id="disable_auth">
	                                <div class="row">
	                                    <div class="col-xl-5"><img src="{{ asset('assets/img/unlock.svg') }}"></div>
	                                    <div class="col">
	                                        <form method="post" class="disable_auth">
	                                            <div class="table-responsive table-borderless">
	                                                <table class="table table-bordered">
	                                                    <tbody>
	                                                        <tr></tr>
	                                                        <tr></tr>
	                                                        <tr>
	                                                            <td class="text-left pb-0">{{ __('settings.string17') }}</td>
	                                                        </tr>
	                                                        <tr>
	                                                            <td>
	                                                                <input class="form-control w-100" type="text" name="code" required="" placeholder="{{ __('settings.string18') }}" minlength="6" autofocus="">
	                                                            </td>
	                                                        </tr>
	                                                        <tr>
	                                                            <td class="p-0 pl-3">
	                                                                <div class="form-check text-left">
	                                                                    <input class="form-check-input" type="checkbox" required="" id="formCheck-1">
	                                                                    <label class="form-check-label" for="formCheck-1">{{ __('settings.string21') }}</label>
	                                                                </div>
	                                                            </td>
	                                                        </tr>
	                                                        <tr>
	                                                            <td>
	                                                                <button class="btn btn-primary btn-block" type="submit">{{ __('settings.string22') }}</button>
	                                                            </td>
	                                                        </tr>
	                                                    </tbody>
	                                                </table>
	                                            </div>
	                                        </form>
	                                    </div>
	                                </div>
	                            </div>
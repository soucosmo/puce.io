								<div class="tab-pane fade text-black-50 p-3" role="tabpanel" id="change_password">
	                                <div class="row">
	                                    <div class="col-xl-5"><img src="{{ asset('assets/img/password.svg') }}"></div>
	                                    <div class="col">
	                                        <form method="post" class="change_password">
	                                            <div class="table-responsive table-borderless">
	                                                <table class="table table-bordered">
	                                                    <tbody>
	                                                        <tr>
	                                                            <td class="text-left pb-0">{{ __('settings.password_current') }}</td>
	                                                        </tr>
	                                                        <tr>
	                                                            <td class="pb-0">
	                                                                <input class="form-control w-100" type="text" name="password_current" required="" placeholder="{{ __('settings.string3') }}" autofocus="">
	                                                            </td>
	                                                        </tr>
	                                                        <tr>
	                                                            <td class="text-left pb-0">{{ __('settings.password_new') }}</td>
	                                                        </tr>
	                                                        <tr>
	                                                            <td class="pb-0">
	                                                                <input class="form-control w-100" type="text" name="password" required="" placeholder="{{ __('settings.string4') }}">
	                                                            </td>
	                                                        </tr>
	                                                        <tr>
	                                                            <td class="text-left pb-0">{{ __('settings.password_confirmation') }}</td>
	                                                        </tr>
	                                                        <tr>
	                                                            <td class="pb-0">
	                                                                <input class="form-control w-100" type="text" name="password_confirmation" required="" placeholder="{{ __('settings.string5') }}">
	                                                            </td>
	                                                        </tr>
	                                                        <tr>
	                                                            <td class="pb-0">
	                                                                <div class="form-check text-left">
	                                                                    <input class="form-check-input" type="checkbox" required="" id="formCheck-2">
	                                                                    <label class="form-check-label" for="formCheck-2">{{ __('settings.string6') }}</label>
	                                                                </div>
	                                                            </td>
	                                                        </tr>
	                                                        <tr>
	                                                            <td>
	                                                                <button class="btn btn-primary btn-block" type="submit">Trocar Senha</button>
	                                                            </td>
	                                                        </tr>
	                                                    </tbody>
	                                                </table>
	                                            </div>
	                                        </form>
	                                    </div>
	                                </div>
	                            </div>
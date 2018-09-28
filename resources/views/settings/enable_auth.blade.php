								<div class="tab-pane fade text-black-50 p-3" role="tabpanel" id="enable_auth">
	                                <div class="row">
	                                    <div class="col-xl-4"><img src="{{ asset('assets/img/qrcode.png') }}" class="ml-2"></div>
	                                    <div class="col">
	                                        <form method="post" class="enable_auth">
	                                            <div class="table-responsive table-borderless">
	                                                <table class="table table-bordered">
	                                                    <tbody>
	                                                        <tr>
	                                                            <td class="text-left pb-0">{{ __('settings.secret') }}</td>
	                                                        </tr>
	                                                        <tr>
	                                                            <td>
	                                                                <input class="form-control w-100 copy" type="text" value="6TFYNOZ6GXFE5VSF" readonly="">
	                                                                <small class="form-text text-left text-muted">{{ __('settings.string16') }}</small></td>
	                                                        </tr>
	                                                        <tr>
	                                                            <td class="text-left pb-0">{{ __('settings.string17')}}</td>
	                                                        </tr>
	                                                        <tr>
	                                                            <td>
	                                                                <input class="form-control w-100" type="text" name="code" required="" autofocus="" placeholder="{{ __('settings.string18') }}">
	                                                            </td>
	                                                        </tr>
	                                                        <tr>
	                                                            <td class="p-0 pl-3">
	                                                                <div class="form-check text-left">
	                                                                    <input class="form-check-input" type="checkbox" required="" id="formCheck-1">
	                                                                    <label class="form-check-label" for="formCheck-1">{{ __('settings.string19') }}</label>
	                                                                </div>
	                                                            </td>
	                                                        </tr>
	                                                        <tr>
	                                                            <td>
	                                                                <button class="btn btn-primary btn-block" type="submit">{{ __('settings.string20') }}</button>
	                                                            </td>
	                                                        </tr>
	                                                    </tbody>
	                                                </table>
	                                            </div>
	                                        </form>
	                                    </div>
	                                </div>
	                            </div>
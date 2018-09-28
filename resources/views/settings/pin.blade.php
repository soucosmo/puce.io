								<div class="tab-pane fade text-black-50 p-3" role="tabpanel" id="change_pin">
	                                <div class="row">
	                                    <div class="col-xl-5"><img src="{{ asset('assets/img/key%20(2).svg') }}"></div>
	                                    <div class="col">
	                                        <form method="post" class="change_pin">
	                                            <div class="table-responsive table-borderless">
	                                                <table class="table table-bordered">
	                                                    <tbody>
	                                                        <tr>
	                                                            <td class="text-left pb-0">{{ __('settings.string8') }}</td>
	                                                        </tr>
	                                                        <tr>
	                                                            <td class="pb-0">
	                                                                <input class="form-control w-100" type="text" name="pin_current" required="" placeholder="{{ __('settings.string9') }}" autofocus="">
	                                                            </td>
	                                                        </tr>
	                                                        <tr>
	                                                            <td class="text-left pb-0">{{ __('settings.string10') }}</td>
	                                                        </tr>
	                                                        <tr>
	                                                            <td class="pb-0">
	                                                                <input class="form-control w-100" type="text" required="" placeholder="{{ __('settings.string11') }}">
	                                                            </td>
	                                                        </tr>
	                                                        <tr>
	                                                            <td class="text-left pb-0">{{ __('settings.string12') }}</td>
	                                                        </tr>
	                                                        <tr>
	                                                            <td class="pb-0">
	                                                                <input class="form-control w-100" type="text" name="pin_confirmation" required="" placeholder="{{ __('settings.string13') }}">
	                                                            </td>
	                                                        </tr>
	                                                        <tr>
	                                                            <td class="pb-0">
	                                                                <div class="form-check text-left">
	                                                                    <input class="form-check-input" type="checkbox" required="" id="formCheck-2">
	                                                                    <label class="form-check-label" for="formCheck-2">{{ __('settings.string14') }}</label>
	                                                                </div>
	                                                            </td>
	                                                        </tr>
	                                                        <tr>
	                                                            <td>
	                                                                <button class="btn btn-primary btn-block" type="submit">{{ __('settings.string15') }}</button>
	                                                            </td>
	                                                        </tr>
	                                                    </tbody>
	                                                </table>
	                                            </div>
	                                        </form>
	                                    </div>
	                                </div>
	                            </div>
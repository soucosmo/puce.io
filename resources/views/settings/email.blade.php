								<div class="tab-pane fade show active text-black-50 p-3" role="tabpanel" id="change_email">
	                                <div class="row">
	                                    <div class="col-xl-5"><img src="{{ asset('assets/img/email%20(2).svg') }}"></div>
	                                    <div class="col">
	                                        <form method="post" class="change_profile">
	                                            <div class="table-responsive table-borderless">
	                                                <table class="table table-bordered">
	                                                    <tbody>
	                                                        
	                                                        <tr>
	                                                            <td class="text-left pb-0">{{ __('settings.email') }}</td>
	                                                        </tr>
	                                                        <tr>
	                                                            <td class="pb-0">
	                                                                <input class="form-control w-100" type="text" name="email" required="" placeholder="{{ Auth::User()->email }}" value="{{ Auth::User()->email }}">
	                                                            </td>
	                                                        </tr>
	                                                        <tr>
	                                                            <td class="pb-0">
	                                                                <div class="form-check text-left">
	                                                                    <input class="form-check-input" type="checkbox" required="" id="formCheck-2">
	                                                                    <label class="form-check-label" for="formCheck-2">{{ __('settings.string1') }}</label>
	                                                                </div>
	                                                            </td>
	                                                        </tr>
	                                                        <tr>
	                                                            <td>
	                                                                <button class="btn btn-primary btn-block" type="submit">{{ __('settings.string2') }}</button>
	                                                            </td>
	                                                        </tr>
	                                                    </tbody>
	                                                </table>
	                                            </div>
	                                        </form>
	                                    </div>
	                                </div>
	                                <div class="row mt-1 mr-3 ml-3 mb-2 d-none">
	                                    <div class="col p-3" style="border: 1px solid #888;">
	                                        <h6 class="title-address mb-0">Payment ID</h6>
	                                        <input type="text" value="56165165165165165165165165165" readonly="" class="w-100 text-center text-secondary input-address text-bold copy">
	                                    </div>
	                                </div>
	                            </div>
	                            
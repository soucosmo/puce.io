								<div class="tab-pane fade text-black-50 p-3" role="tabpanel" id="api">
	                                <div class="row">
	                                    <div class="col-xl-5"><img src="{{ asset('assets/img/keyword.svg') }}"></div>
	                                    <div class="col">
	                                        <form method="post" class="api_key">
	                                            <div class="table-responsive table-borderless">
	                                                <table class="table table-bordered">
	                                                    <tbody>
	                                                       
	                                                        <tr>
	                                                            <td class="text-left pb-0">{{ __('settings.string23') }}</td>
	                                                        </tr>
	                                                        <tr>
	                                                            <td>
	                                                                <input class="form-control w-100 td-addresses copy text-bold text-center" type="text" value="D12EDDDD7DF0192EEC538DD8140C38468A6F8D52" readonly="" required="" minlength="6">
	                                                            </td>
	                                                        </tr>
	                                                        <tr>
	                                                            <td class="text-left pb-0">{{ __('settings.string24') }}</td>
	                                                        </tr>
	                                                        <tr>
	                                                            <td>
	                                                                <input class="form-control w-100 td-addresses text-bold text-center" type="text" name="code" placeholder="{{ __('settings.string25') }}" minlength="6" autofocus="">
	                                                            </td>
	                                                        </tr>
	                                                        <tr>
	                                                            <td class="p-0 pl-3">
	                                                                <div class="form-check text-left">
	                                                                    <input class="form-check-input" type="checkbox" required="" id="formCheck-1">
	                                                                    <label class="form-check-label" for="formCheck-1">Ao gerar uma nova chave as antigas irão parar de funcionar</label>
	                                                                </div>
	                                                            </td>
	                                                        </tr>
	                                                        <tr>
	                                                            <td>
	                                                                <button class="btn btn-primary btn-block" type="submit">Gerar Nova Chave&nbsp;</button>
	                                                            </td>
	                                                        </tr>
	                                                    </tbody>
	                                                </table>
	                                            </div>
	                                        </form>
	                                    </div>
	                                </div>
	                            </div>
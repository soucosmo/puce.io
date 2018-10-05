                                <div class="tab-pane fade text-black-50 p-0" role="tabpanel" id="addresses">
                                    <div class="row">
                                        <div class="col">
                                            <div class="table-responsive">
                                                <table class="table table-striped">
                                                    <thead>
                                                        <tr>
                                                            <th>{{ __('dashboard.origin') }}</th>
                                                            <th class="w-40">{{ __('dashboard.address') }}</th>
                                                            <th class="w-15 d-none">{{ __('dashboard.paymentid') }}</th>
                                                            <th>{{ __('dashboard.received') }}</th>
                                                            <th>{{ __('dashboard.created') }}</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @forelse ($addresses as $data)
                                                        <tr>
                                                            <td class="td-addresses">{{ $data->api ? 'API' : 'DEFAULT' }}</td>
                                                            <td>
                                                                <input type="text" value="{{ $data->address }}" readonly="" class="w-100 text-center input-address copy td-addresses text-muted">
                                                            </td>
                                                            <td class="td-addresses">0.00000000</td>
                                                            <td class="d-none">
                                                                <input type="text" value="a5c4030ca15eca520e9bda5b0855fa28632ddd00bd6cb576afd3c24d1ca7d3eb" readonly="" class="w-100 text-center text-muted input-address copy td-addresses">
                                                            </td>
                                                            <td class="td-addresses">{{ $data->created_at }}</td>
                                                        </tr>
                                                        @empty
                                                        <tr>
                                                            <td colspan="4" class="td-addresses">{{ __('dashboard.no_records') }}</td>
                                                            
                                                        </tr>
                                                        @endforelse
                                                    </tbody>
                                                </table>
                                            </div>
                                            <nav class="m-1 ml-3">
                                                {{ $addresses->links() }}
                                            </nav>
                                            
                                        </div>
                                    </div>
                                </div>
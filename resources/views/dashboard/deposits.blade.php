                                <div class="tab-pane fade text-black-50 p-0" role="tabpanel" id="deposits">
                                    <div class="row">
                                        <div class="col">
                                            <div class="table-responsive">
                                                <table class="table table-striped">
                                                    <thead>
                                                        <tr>
                                                            <th>ID</th>
                                                            <th class="w-40">{{ __('dashboard.address')}}</th>
                                                            <th>{{ __('dashboard.amount') }}</th>
                                                            <th>{{ __('dashboard.status') }}</th>
                                                            <th>{{ __('dashboard.created') }}</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @forelse ($deposits as $data)

                                                        <tr>
                                                            <td class="td-addresses">{{ $data->id }}</td>
                                                            <td>
                                                                <input type="text" value="{{ $data->address}}" readonly="" class="w-100 text-center input-address copy td-addresses text-muted">
                                                            </td>
                                                            <td class="td-addresses">{{ $data->amount }}</td>

                                                            @if ($data->status != 'complete')
                                                            <td class="w-10 text-danger">
                                                            @else
                                                            <td class="w-10 text-success">
                                                            @endif
                                                                {{ $data->status }}
                                                            </td>

                                                            <td class="td-addresses">{{ $data->created_at }}</td>
                                                        </tr>
                                                        @empty
                                                        <tr>
                                                            <td colspan="5" class="td-addresses">{{ __('dashboard.no_records') }}</td>
                                                            
                                                        </tr>
                                                        @endforelse
                                                    </tbody>
                                                </table>
                                            </div>
                                            <nav class="m-1 ml-3">
                                                {{ $deposits->links() }}
                                            </nav>
                                        </div>
                                    </div>
                                </div>
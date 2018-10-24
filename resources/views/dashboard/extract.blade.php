                                <div class="tab-pane fade text-black-50 p-0" role="tabpanel" id="extract">
                                    <div class="row">
                                        <div class="col">
                                            <div class="table-responsive">
                                                <table class="table table-striped">
                                                    <thead>
                                                        <tr>
                                                            <th>{{ __('dashboard.action') }}</th>
                                                            <th class="w-30">{{ __('dashboard.description') }}</th>
                                                            <th>{{ __('dashboard.amount') }}</th>
                                                            <th>{{ __('dashboard.final_balance') }}</th>
                                                            <th>{{ __('dashboard.created') }}</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @forelse ($extract as $data)
                                                        <tr>
                                                            <td class="td-addresses">{{ $data->action }}</td>
                                                            <td class="td-addresses">{{ $data->description }}</td>
                                                            @if ($data->type)
                                                            <td class="td-addresses text-success">+{{ $data->amount }}</td>
                                                            @else
                                                            <td class="td-addresses text-danger">-{{ $data->amount }}</td>
                                                            @endif
                                                            <td class="td-addresses">{{ $data->after }}</td>
                                                            <td class="td-addresses">{{ $data->created_at }}</td>
                                                        </tr>
                                                        @empty
                                                        <th>
                                                            <td class="td-address" colspan="5">{{ __('dashboard.no_records') }}</td>
                                                        </th>
                                                        @endforelse
                                                        
                                                    </tbody>
                                                </table>
                                            </div>
                                            <nav class="m-1 ml-3">
                                                {{ $extract->links() }}
                                            </nav>
                                        </div>
                                    </div>
                                </div>
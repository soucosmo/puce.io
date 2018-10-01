                <div class="col-xl-3">
                    <div style="background-color: rgb(240,241,242);">
                        <h2 class="text-muted mb-1">Moedas</h2>
                        <div class="w-100 p-1 bg-white mb-4" style="max-height: 470px; overflow-Y: auto;">
                            <ul class="nav nav-tabs flex-column">
                                @forelse ($altcoins as $coins)
                                <li class="nav-item">
                                    <a class="nav-link text-light bg-secondary mb-1" href="{{ Route('dashboard', strtoupper($coins['coin'])) }}">{{ $coins['name'] }}</a>
                                </li>
                                @empty
                                <li class="nav-item">
                                    <a class="nav-link text-light bg-secondary mb-1" href="{{ Route('dashboard', 'BTC') }}">Bitcoin</a>
                                </li>
                                @endforelse
                            </ul>
                        </div>
                    </div>
                </div>
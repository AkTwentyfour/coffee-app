@extends('layouts.app')

@section('content')
    <div class="row gy-3">
        <div class="col-md-8">
            <div class="card cashier-card">
                <div class="card-body p-4">
                    <div>fitur filter nysul ygy</div>
                    <div class="row gy-4">

                        @php $id = 1; @endphp
                        @foreach ($comodities as $item)
                            <div class="col-md-4">
                                <div class="item" style="background-image: url({{ asset('img/kwasong.png') }})"
                                    data-id="{{ $id }}" name="{{ $item['name'] }}" data-price="{{ $item['price'] }}"
                                    data-count="0" data-quantity="0">
                                    <div class="item-info">
                                        <div>
                                            <div class="fs-7">{{ $item['name'] }}</div>
                                            <div class="fs-7">{{ $item['price'] }}</div>
                                        </div>
                                        <div class="count">
                                            <div id="amount">0</div>
                                            <button id="minus" data-target="{{ $item['name'] }}">-</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @php $id++ @endphp
                        @endforeach

                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card cashier-card p-1">
                <div class="card-body p-2">
                    <div class="card border-0 purchase-details">
                        <div class="card-body d-flex flex-column">
                            <div class="test">
                                <table class="table table-borderless">
                                    <thead>
                                        <tr>
                                            <th>Menu</th>
                                            <th>Value</th>
                                            <th>Prices</th>
                                        </tr>
                                    </thead>
                                    <tbody id="item-detail">

                                    </tbody>
                                </table>
                            </div>
                            <div id="item-total">
                                <div>Total</div>
                                <div id="total"></div>
                            </div>
                            <div class="p-2 d-flex justify-content-between">
                                <div class="fw-bold">Kembali</div>
                                <div class="cashback fw-bold"></div>
                            </div>
                            <div id="total-count">
                                <form action="{{ route('store') }}" method="POST">
                                    @csrf
                                    <div id="input">

                                    </div>
                                    <div class="d-flex justify-content-between">
                                        <label for="cash" class="form-label fw-bold">Uang</label>
                                        <div class="fw-bold cash-output fw-bold"></div>
                                    </div>
                                    <input type="number" class="form-control cash-input" id="cash" placeholder="Rp.">
                                    <div class="d-flex gap-1 mt-4">
                                        <button class="btn count-btn">Hitung</button>
                                        <button class="btn save-btn">Simpan</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script src="{{ asset('js/cashier.js') }}"></script>    
@endsection
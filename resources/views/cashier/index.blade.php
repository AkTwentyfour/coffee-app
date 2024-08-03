@extends('layouts.app')

@section('content')
    <div class="row gy-3">
        <div class="col-md-8">
            <div class="card" style="background-color: var(--second);">
                <div class="card-body p-4 scroll-card">
                    <div class="d-flex flex-wrap justify-content-start align-items-center gap-1 mb-4">
                        <button class="filter-btn btn  filter-btn-active" data-value="all">all</button>
                        <button class="filter-btn btn" data-value="coffee">Coffee</button>
                        <button class="filter-btn btn" data-value="non_coffee">Non Coffee</button>
                        <button class="filter-btn btn" data-value="traditional_coffee">Traditional Coffee</button>
                        <button class="filter-btn btn" data-value="snack">Snack</button>
                        <button class="filter-btn btn" data-value="heavy_meal">Heavy Meal</button>
                    </div>
                    <div class="row gy-4">

                        @php $id = 1; @endphp
                        @foreach ($comodities as $item)
                            <div class="col-md-4 item-col" data-category="{{ $item['category'] }}">
                                <div class="item" style="background-image: url({{ asset('comodity_images/placeholder-red.png') }})"
                                    data-id="{{ $id }}" name="{{ $item['name'] }}" data-price="{{ $item['price'] }}"
                                    data-count="0" data-quantity="0">
                                    <div class="item-info">
                                        <div>
                                            <div class="fs-6">{{ $item['name'] }}</div>
                                            <div class="fs-6">{{ $item->formatted_price }}</div>
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
            <div class="card p-1" style="background-color: var(--second);">
                <div class="card-body p-2 scroll-card">
                    <div class="card border-0 purchase-details">
                        <div class="card-body d-flex flex-column">
                            <div class="test">
                                <table class="table table-borderless cashier-table">
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
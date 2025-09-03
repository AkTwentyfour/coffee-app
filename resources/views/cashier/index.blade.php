@extends('layouts.app')

@section('content')
    <div class="row gy-3">
        {{-- menu card --}}
        <div class="col-md-8">
            <div class="card" style="background-color: var(--second);">
                <div class="card-body p-4">
                    <div class="row pb-2" style="z-index: 1000;">
                        <div id="searchForm" class="search col-sm-4" style="overflow: hidden">
                            <input type="text" id="searchInput" name="search-product" placeholder="Cari sesuatu...">
                            <button type="button" class="btn filter-btn">Cari</button>
                        </div>
                        <div class="col-sm-8 d-flex align-items-center gap-1 scroll-horizontal">
                            <button class="filter-btn btn  filter-btn-active" data-value="all">all</button>
                            @foreach ($comodityCategories as $category)
                                <button class="filter-btn btn"
                                    data-value="{{ $category->id }}">{{ $category->name }}</button>
                            @endforeach
                        </div>
                    </div>
                    <div class="scroll-card" style="height: 67vh; min-height: 67vh;">
                        <div class="row gy-4 flex-wrap">
                            @foreach ($comodities as $item)
                                <div class="col-sm-4 item-col" data-category="{{ $item['comodity_category_id'] }}"
                                    style="{{ $loop->first || $loop->iteration % 4 === 0 ? 'z-index:100;' : '' }}">
                                    <div class="item"
                                        style="background-image: url({{ asset('comodity_images/' . $item['images']) }})"
                                        data-id="{{ $item->id }}" name="{{ $item['name'] }}"
                                        data-price="{{ $item['price'] }}" data-count="0" data-quantity="0">
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
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
        {{-- receipt card section (not printable guys) --}}
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
                                <div id="change_amount" class="fw-bold"></div>
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

                                    {{-- cash_paid display --}}
                                    <input type="text" id="cash_paid_display" class="form-control cash-input"
                                        placeholder="Rp." required>
                                    {{-- hidden input raw cash_paid --}}
                                    <input type="hidden" name="cash_paid" id="cash_paid">

                                    <div class="d-flex gap-1 mt-4">
                                        <button type="button" class="btn count-btn">Hitung</button>
                                        <button type="submit" class="btn save-btn">Simpan</button>

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

    {{-- search feature --}}
    <script>
        const searchInput = document.querySelector('input[name="search-product"]');

        searchInput.addEventListener("input", function() {
            const query = this.value.toLowerCase().trim();
            const items = document.querySelectorAll(".item-col");

            items.forEach((item) => {
                const name = item.querySelector(".item").getAttribute("name").toLowerCase();

                if (name.includes(query)) {
                    item.classList.remove("hide");
                } else {
                    item.classList.add("hide");
                }
            });
        });
    </script>

    {{-- format cash_paid rupiah --}}
    <script>
        const cashInput = document.getElementById('cash_paid');

        cashInput.addEventListener('input', function(e) {
            let value = this.value.replace(/\D/g, ''); // hanya angka
            if (!value) {
                this.value = "";
                return;
            }

            // Format angka jadi ribuan
            this.value = value.replace(/\B(?=(\d{3})+(?!\d))/g, ".");
        });

        // Optional: hilangkan titik sebelum dikirim ke server
        document.querySelector('form').addEventListener('submit', function() {
            cashInput.value = cashInput.value.replace(/\./g, '');
        });
    </script>

    {{-- error message handling --}}
    @if ($errors->any())
        <script>
            Swal.fire({
                icon: 'error',
                title: 'Transaksi Error',
                html: "{{ $errors->first() }}",
                showConfirmButton: false,
                timer: 3000
            });
        </script>
    @endif

    @if (session('error'))
        <script>
            Swal.fire({
                icon: 'error',
                title: 'Transaksi Error',
                text: "{{ session('error') }}",
                showConfirmButton: false,
                timer: 3000
            })
        </script>
    @endif

    {{-- success message handling --}}
    @if (session('success'))
        <script>
            Swal.fire({
                icon: 'success',
                title: 'Berhasil!',
                text: "{{ session('success') }}",
                showConfirmButton: false,
                timer: 3000
            })
        </script>
    @endif
@endsection

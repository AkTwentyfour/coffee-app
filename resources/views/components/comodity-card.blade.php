<div class="row gy-4 flex-wrap">
    @php $id = 1; @endphp
    @foreach ($comodities as $item)
        <div class="col-md-4 item-col" data-category="{{ $item['category'] }}"
            style="{{ $loop->first || $loop->iteration % 4 === 0 ? 'z-index:100;' : '' }}">
            <div class="item"
                style="background-image: url({{ asset('comodity_images/' . $item['images']) }})"
                data-id="{{ $id }}" name="{{ $item['name'] }}"
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
        @php $id++ @endphp
    @endforeach

    @if($comodities->isEmpty())
        <p class="text-muted">Produk tidak ditemukan</p>
    @endif
</div>
<script src="{{ asset('js/cashier.js') }}"></script>
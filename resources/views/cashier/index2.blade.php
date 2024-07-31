@extends('layouts.app')

@section('content')
    {{-- @dump($comodities) --}}
    <div class="row">
        <div class="col-md-8">
            <div class="row">
                @foreach ($comodities as $c)
                    <div class="col-md-3">
                        <div class="card item" value="{{ $c['name'] }}">
                            <div class="card-body">
                                <h4>id : {{ $c['id'] }}</h4>
                                <h4>name : {{ $c['name'] }}</h4>
                                <h4>price : {{ $c['price'] }}</h4>
                                <h4>stock : {{ $c['stock'] }}</h4>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
        <div class="col-md-4">
            <div class="card">
                <div class="card-body">
                    <div id="saleId"></div>
                    <div id="comodityId"></div>
                    <div id="quantity"></div>
                    <div id="price"></div>
                    <h3 id="subtotal">Checkout</h3>
                </div>
            </div>
        </div>
    </div>

    <form action="{{ route('test') }}" method="POST">
        @csrf
        @php $id = 1 @endphp
        @foreach ($comodities as $c)
            <input type="hidden" name="sale_id_{{ $id }}" value="1">
            <input type="hidden" name="comodity_id_{{ $id }}" value="{{ $c['id'] }}">
            <input type="hidden" name="quantity_{{ $id }}" value="3">
            <input type="hidden" name="price_{{ $id }}" value="10000">
            <input type="hidden" name="subtotal_{{ $id }}" value="30000">
            {{ $id }}
            @php $id++ @endphp
        @endforeach
        <button type="submit" class="btn btn-outline-danger">Checkout</button>
    </form>

    <script>
        const item = document.querySelectorAll('.item')
        const subtotal = document.getElementById('subtotal')

        item.forEach((test) => {
            const itemId = test.getAttribute('value')
            test.addEventListener('click', () => {
                console.log('success')
                subtotal.innerHTML = 'id : ' + itemId
            })
        });
    </script>
@endsection

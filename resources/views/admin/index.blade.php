@extends('layouts.app')

@section('content')
    <div class="row gy-3">
        <div class="col-md-8">
            <div class="card cashier-card">
                <div class="card-body p-4">
                    <div class="d-flex justify-content-between mb-2">
                        <div class="d-flex justify-content-center align-items-center gap-1">
                            <div class="fs-5 fw-bold">Filter :</div>
                            <button class="btn btn-first filter-btn" data-value="food">Food</button>
                            <button class="btn btn-first filter-btn" data-value="beverages">Beverages</button>
                        </div>
                        <a class="add btn btn-first">Add new item</a>
                    </div>
                    <div class="row gy-4">

                        @php $id = 1; @endphp
                        @foreach ($comodities as $item)
                            <div class="col-md-4">
                                <div class="item"
                                    style="background-image: url({{ asset('comodity_images/' . $item['images']) }})"
                                    data-id="{{ $id }}" data-name="{{ $item['name'] }}"
                                    data-stock="{{ $item['stock'] }}" data-price="{{ $item['price'] }}" data-category="{{ $item['category'] }}">
                                    <div class="item-info h-100">
                                        <div class="d-flex flex-column h-100">
                                            <div class="fs-6 mb-auto">{{ $item['name'] }}</div>
                                            <div class="fs-7">Stock : {{ $item['stock'] }}</div>
                                            <div class="fs-7">Price : {{ $item['price'] }}</div>
                                            <div class="fs-7">Category : {{ $item['category'] }}</div>
                                        </div>
                                        <div class="action align-self-end">
                                            <img src="{{ asset('img/edit.png') }}" height="30" class="me-1 edit"
                                                data-id="{{ $id }}" data-name="{{ $item['name'] }}"
                                                data-stock="{{ $item['stock'] }}" data-price="{{ $item['price'] }}"
                                                data-category="{{ $item['category'] }}">
                                            <img src="{{ asset('img/delete.png') }}" height="30" class="delete"
                                                data-id="{{ $id }}" data-name="{{ $item['name'] }}"
                                                data-stock="{{ $item['stock'] }}" data-price="{{ $item['price'] }}"
                                                data-category="{{ $item['category'] }}">
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
                        <div class="card-body d-flex flex-column p-5">
                            <form action="" method="POST" id="crud-form" enctype="multipart/form-data">
                                @csrf
                                <input type="hidden" name="id" id="item_id">
                                <div class="mb-2 custom-file-input">
                                    <input type="file" name="images" id="images" class="form-control">
                                </div>
                                <div class="mb-2">
                                    <label for="name">Name</label>
                                    <input type="text" name="name" id="name" class="form-control crud-input">
                                </div>
                                <div class="mb-2">
                                    <label for="price">Price</label>
                                    <input type="number" name="price" id="price" class="form-control crud-input">
                                </div>
                                <div class="mb-2">
                                    <label for="stock">Stock</label>
                                    <input type="text" name="stock" id="stock" class="form-control crud-input">
                                </div>
                                <div class="mb-2">
                                    <label for="category">Category</label>
                                    <select name="category" id="category" class="form-select crud-input">
                                        <option value="beverage">Beverages</option>
                                        <option value="food">Food</option>
                                    </select>
                                </div>
                                <button type="submit" class="btn btn-first mt-4 submit-btn w-100 d-none"></button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script src="{{ asset('js/admin.js') }}"></script>
@endsection

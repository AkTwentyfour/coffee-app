@extends('layouts.app')

@section('content')
    <div class="row gy-3">
        <div class="col-md-8 position-relative">
            <div class="card" style="background-color: var(--second);">
                <div class="card-body p-4 scroll-card">
                    <div class="d-flex justify-content-between mb-4">
                        <div class="d-flex flex-wrap justify-content-start align-items-center gap-1">
                            <button class="filter-btn btn  filter-btn-active" data-value="all">all</button>
                            <button class="filter-btn btn" data-value="coffee">Coffee</button>
                            <button class="filter-btn btn" data-value="non_coffee">Non Coffee</button>
                            <button class="filter-btn btn" data-value="traditional_coffee">Traditional Coffee</button>
                            <button class="filter-btn btn" data-value="snack">Snack</button>
                            <button class="filter-btn btn" data-value="heavy_meal">Heavy Meal</button>
                        </div>
                        <div>
                            <a class="add btn btn-first" style="height: max-content">Add +</a>
                        </div>
                    </div>
                    <div class="row gy-4">

                        @php $id = 1; @endphp
                        @foreach ($comodities as $item)
                            <div class="col-md-4 item-col" data-category="{{ $item['category'] }}">
                                <div class="item"
                                    style="background-image: url({{ asset('comodity_images/' . $item['images']) }})"
                                    data-id="{{ $item['id'] }}" data-name="{{ $item['name'] }}"
                                    data-stock="{{ $item['stock'] }}" data-price="{{ $item['price'] }}"
                                    data-category="{{ $item['category'] }}">
                                    <div class="item-info">
                                        <div>
                                            <div class="fs-6">{{ $item['name'] }}</div>
                                            <div class="fs-6">{{ $item->formatted_price }}</div>
                                        </div>
                                        <div class="action align-self-end">
                                            <img src="{{ asset('img/edit.png') }}" height="30" class="me-1 edit"
                                                data-id="{{ $item['id'] }}" data-name="{{ $item['name'] }}"
                                                data-stock="{{ $item['stock'] }}" data-price="{{ $item['price'] }}"
                                                data-category="{{ $item['category'] }}">
                                            <img src="{{ asset('img/delete.png') }}" height="30" class="delete"
                                                data-id="{{ $item['id'] }}" data-name="{{ $item['name'] }}"
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
            <div class="card p-1" style="background-color: var(--second);">
                <div class="card-body p-2 scroll-card">
                    <div class="card border-0 purchase-details">
                        <div class="card-body d-flex flex-column p-5">
                            <form action="" method="POST" id="crud-form" enctype="multipart/form-data">
                                @csrf
                                <input type="hidden" name="id" id="item_id">
                                <div class="mb-2 custom-file-input">
                                    <input type="file" name="images" id="images" class="form-control" required
                                        disabled>
                                </div>
                                <div class="mb-2">
                                    <label for="name">Name</label>
                                    <input type="text" name="name" id="name" class="form-control crud-input"
                                        disabled>
                                </div>
                                <div class="mb-2">
                                    <label for="price">Price</label>
                                    <input type="number" name="price" id="price" class="form-control crud-input"
                                        disabled>
                                </div>
                                <div class="mb-2">
                                    <label for="stock">Stock</label>
                                    <input type="text" name="stock" id="stock" class="form-control crud-input"
                                        disabled>
                                </div>
                                <div class="mb-2">
                                    <label for="category">Category</label>
                                    <select name="category" id="category" class="form-select crud-input" disabled>
                                        <option id="defaultCategory"></option>
                                        <option value="coffee">Coffee</option>
                                        <option value="non_coffee">Non Coffee</option>
                                        <option value="traditional_coffee">Traditional Coffee</option>
                                        <option value="snack">Snack</option>
                                        <option value="heavy_meal">Heavy Meal</option>
                                    </select>
                                </div>

                                <div class="alert alert-info p-2 mt-4">
                                    <p class="text-center m-0">Pilih aksi terlebih dahulu<br>(Add, Edit, atau Delete)</p>
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

    @if ($errors->any())
        <script>
            Swal.fire({
                icon: 'error',
                title: 'Validation Error',
                html: `{!! implode('<br>', $errors->all()) !!}`,
                showConfirmButton: false,
                timer: 3000
            });
        </script>
    @endif

    @if (session('success'))
        <script>
            Swal.fire({
                icon: 'success',
                title: 'Berhasil!',
                text: "{{ session('success') }}",
                showConfirmButton: false,
                timer: 3000
            });
        </script>
    @endif
@endsection

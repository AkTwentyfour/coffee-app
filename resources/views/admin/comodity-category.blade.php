@extends('layouts.app')

@section('content')
    <div class="row gy-3">
        <div class="col-md-8 position-relative">
            <div class="card" style="background-color: var(--second);">
                <div class="card-body p-4 scroll-card">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <div class="fw-bold">Manage Category</div>
                        <a class="add btn btn-first" style="height: max-content">Add +</a>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-hover sales-table">
                            <thead>
                                <tr>
                                    <th scope="col">No</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($comodityCategory as $item)
                                    <tr>
                                        <td>{{ $item['id'] }}</td>
                                        <td>{{ $item['name'] }}</td>
                                        <td>
                                            <button class="btn btn-first edit" data-id="{{ $item['id'] }}" data-name="{{ $item['name'] }}">
                                                <img src="{{ asset('img/edit.png') }}" height="25">
                                            </button>
                                            <button class="btn btn-first delete" data-id="{{ $item['id'] }}" data-name="{{ $item['name'] }}">
                                                <img src="{{ asset('img/delete.png') }}" height="25">
                                            </button>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
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
                                <div class="mb-2">
                                    <label for="name" class="mb-2">Catgory Name</label>
                                    <input type="text" name="name" id="name" class="form-control crud-input"
                                        disabled>
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
    <script src="{{ asset('js/comodity-category.js') }}"></script>

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

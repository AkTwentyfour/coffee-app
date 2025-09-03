@extends('layouts.app')

<style>
    .pagination {
        margin-bottom: 0px;
    }
    .text-muted {
        margin-bottom: 0px;
        margin-right: 10px;
    }
    .page-link.active, .active > .page-link {
        background-color: #4f0e0e !important;
        border-color: #4f0e0e !important;
        color: white !important;
    }
    .page-link {
        color: #4f0e0e !important;
    }
</style>

@section('content')
    <div class="card px-4 py-2" style="background-color: var(--second);">
        <div class="row justify-content-center align-items-center gy-2">
            <div class="col-md-4">
                <form action="{{ route('sales') }}" method="GET" class="pb-2 d-flex gap-1">
                    <input type="text" id="date_range" name="date_range" placeholder="Pilih jangka waktu"
                        value="{{ request('date_range') }}" class="form-control" autocomplete="off">

                    <button type="submit" class="btn filter-btn ms-2">Filter</button>
                    <a href="{{ route('sales') }}" class="btn btn-first">Clear</a>
                </form>

            </div>
            <div class="col-md-4">
                <div class="fw-bold mb-2 text-center">Laporan Transaksi Penjualan</div>
            </div>
            <div class="col-md-4">
                <div class="mb-2 text-end">Total Keuntungan bersih : <span
                        class="fw-bold">Rp{{ number_format($total_gross_margin, 0, ',', '.') }}</span></div>
            </div>
        </div>
        <div class="card-body px-5 py-2 bg-light scroll-card" style="height: 65vh">
            <div class="table-responsive">
                <table class="table table-hover sales-table">
                    <thead>
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">waktu & tanggal</th>
                            <th scope="col">total transaksi</th>
                            <th scope="col">Keuntungan Bersih</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($sales as $item)
                            <tr>
                                <td>{{ $loop->iteration + ($sales->currentPage() - 1) * $sales->perPage() }}</td>
                                <td>{{ $item->sale_date }}</td>
                                <td>Rp. {{ $item->formatted_total_amount }}</td>
                                <td>Rp. {{ $item->formatted_gross_margin }}</td>
                                <td>
                                    <a class="btn btn-first" href="{{ route('sales-detail', $item->id) }}">Detail</a>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="text-center">Belum ada transaksi</td>
                            </tr>
                        @endforelse
                    </tbody>

                </table>
            </div>
        </div>
        <div class="d-flex justify-content-between align-items-center mt-2">
            <div class="text-center">Total Uang Masuk : <span class="fw-bold">Rp.
                    {{ number_format($total, 0, ',', '.') }}</span></div>
            <div class="d-flex justify-content-center align-items-center gap-2 p-0">
                {{ $sales->links('pagination::bootstrap-5') }}
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script>
        flatpickr("#date_range", {
            mode: "range",
            dateFormat: "Y-m-d",
            defaultDate: @json(request('date_range'))
        });
    </script>
@endsection

@extends('layouts.app')

@section('content')
    <div class="card px-4 py-2" style="background-color: var(--second);">
        <div class="fw-bold mb-2 text-center">Sales Report</div>
        <div class="card-body px-5 py-2 bg-light scroll-card" style="height: 70vh">
            <div class="table-responsive">
                <table class="table table-hover sales-table">
                    <thead>
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">waktu & tanggal</th>
                            <th scope="col">total transaksi</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($sales as $item)
                            <tr>
                                <td>{{ $item['id'] }}</td>
                                <td>{{ $item['sale_date'] }}</td>
                                <td>Rp. {{ $item->formatted_price }}</td>
                                <td><a href="{{ route('sales-detail', ['id' => $item['id']]) }}">Detail</a></td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <div class="mt-2 text-center">Total Uang Masuk : <span class="fw-bold">Rp. {{ number_format($total, 0, ',', '.') }}</span></div>
    </div>
@endsection

@extends('layouts.app')

@section('content')
    <div class="card px-4 py-2" style="background-color: var(--second);">
        <div class="row justify-content-center align-items-center gy-2">
            <div class="col-md-4">
                <form action="{{ route('testFeature') }}" method="POST" class="pb-2">
                    @csrf
                    <input type="date" name="date">
                    <button type="submit" class="btn btn-outline-first">Filter</button>
                    <a href="{{ route('sales') }}" class="btn btn-first">Clear Filter</a>
                </form>
            </div>
            <div class="col-md-4">
                <div class="fw-bold mb-2 text-center">Sales Report</div>
            </div>
            <div class="col-md-4">
                {{-- <h1>{{ $total_gross_margin }}</h1> --}}
            </div>
        </div>
        <div class="card-body px-5 py-2 bg-light scroll-card" style="height: 70vh">
            <div class="table-responsive">
                <table class="table table-hover sales-table">
                    <thead>
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">waktu & tanggal</th>
                            <th scope="col">total transaksi</th>
                            <th scope="col">Subtotal Gross Margin</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if (isset($shorted_date))
                            @foreach ($shorted_date as $item)
                                <tr>
                                    <td>{{ $item['id'] }}</td>
                                    <td>{{ $item['sale_date'] }}</td>
                                    <td>Rp. {{ $item->formatted_price }}</td>
                                    <td><a href="{{ route('sales-detail', ['id' => $item['id']]) }}">Detail</a></td>
                                </tr>
                            @endforeach
                        @else
                            @for ($i = count($sales) - 1; $i >= 0; $i--)
                                <tr>
                                    <td>{{ $sales[$i]['id'] }}</td>
                                    <td>{{ $sales[$i]['sale_date'] }}</td>
                                    <td>Rp. {{ $sales[$i]->formatted_price }}</td>
                                    <td>Rp. {{ $sales[$i]->formatted_gross_margin }}</td>
                                    <td><a class="btn btn-first" href="{{ route('sales-detail', ['id' => $sales[$i]['id']]) }}">Detail</a></td>
                                </tr>
                            @endfor
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
        <div class="mt-2 text-center">Total Uang Masuk : <span class="fw-bold">Rp.
                {{ number_format($total, 0, ',', '.') }}</span></div>
    </div>
@endsection

@extends('layouts.app')

@section('content')
    <div class="card p-3" style="background-color: var(--second);">
        <div class="card-body p-0 bg-light scroll-card" style="height: max-content">
            <div class="table-responsive">
                <table class="table table-bordered table-hover sales-table">
                    <thead>
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Nama item</th>
                            <th scope="col">Subtotal</th>
                            <th scope="col">save (5%)</th>
                            <th scope="col">KB (85%)</th>
                            <th scope="col">D (10%)</th>
                            <th scope="col">Jumlah KK</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $no = 1;
                            $index = 0;
                        @endphp
                        @foreach ($sales_item as $item)
                            <tr>
                                <td>{{ $no }}</td>
                                <td>{{ $item->comodity->name }}</td>
                                <td>Rp. {{ number_format($item['subtotal'], 0, ',' ,'.') }}</td>
                                <td>Rp. {{ number_format($save_profit[$index], 0, ',', '.') }}</td>
                                <td>Rp. {{ number_format($net_profit[$index], 0, ',', '.') }}</td>
                                <td>Rp. {{ number_format($dead_money[$index], 0, ',', '.') }}</td>
                                <td>Rp. {{ number_format($gross_profit[$index], 0, ',', '.') }}</td>
                            </tr>
                            @php
                                $no++;
                                $index++;
                            @endphp
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <a href="{{ route('sales') }}" class="mt-3 btn btn-first ms-auto" style="width: max-content;">Go back</a>
@endsection

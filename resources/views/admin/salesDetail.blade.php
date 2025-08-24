@extends('layouts.app')

@section('content')
    <div class="card p-3" style="background-color: var(--second);">
        <div class="d-flex justify-content-between align-items-center pb-3">
            <div class="fs-6">Pembelian tanggal : <span class="fw-bold">{{ $sales }}</span></div>
            <div class="fs-6">Subtotal Gross Margin <span class="fw-bold">Rp.{{ number_format($subtotal_gross_margin, 0, ',', '.') }}</span></div>
        </div>
        <div class="card-body p-0 bg-light scroll-card" style="height: max-content">
            <div class="table-responsive">
                <table class="table table-bordered table-hover sales-table">
                    <thead>
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Nama item</th>
                            <th scope="col">HPP</th>
                            <th scope="col">Quantity</th>
                            <th scope="col">Subtotal</th>
                            <th scope="col">Gross margin</th>
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
                                <td>Rp. {{ number_format($item->comodity->cogs, 0, ',', '.') }}</td>
                                <td>{{ $item->quantity }}</td>
                                <td>Rp. {{ number_format($item['subtotal'], 0, ',', '.') }}</td>
                                <td>Rp. {{ number_format($gross_margin[$index], 0, ',', '.') }}</td>
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
        <a href="{{ route('sales') }}" class="mt-3 btn btn-first ms-auto" style="width: max-content;">Go back</a>
    </div>
@endsection

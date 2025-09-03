<?php

namespace App\Http\Controllers;

use App\Models\SalesItem;
use App\Models\Comodities;
use App\Models\Sales;
use Carbon\Carbon;
use Illuminate\Http\Request;

class SalesController extends Controller
{
    public function index(Request $request)
    {
        $query = Sales::query();

        // filter by date range
        if ($request->filled('date_range')) {
            $dates = explode(" to ", $request->date_range);

            if (count($dates) == 2) {
                $start = Carbon::parse($dates[0])->startOfDay();
                $end = Carbon::parse($dates[1])->endOfDay();

                $query->whereBetween('created_at', [$start, $end]);
            }
        }

        $sales = $query->latest()->paginate(10);

        return view("admin.sales", [
            "sales" => $sales,
            "total" => Sales::sum('total_amount'),
            "total_gross_margin" => Sales::sum('gross_profit'),
        ]);
    }


    public function detail($id)
    {
        $sales = Sales::find($id);
        $salesItem = SalesItem::all()->where('sale_id', $id);
        $comodity = SalesItem::with('comodity')->get();
        $gross_margin = [];

        foreach ($salesItem as $item) {
            $margin = $item->comodity->price - $item->comodity->cogs;
            $gross_margin[] = $margin * $item['quantity'];
        }

        $subtotal_gross_margin = array_sum($gross_margin);

        return view('admin.salesDetail', [
            'sales' => $sales,
            'sales_item' => $salesItem,
            'gross_margin' => $gross_margin,
            'subtotal_gross_margin' => $subtotal_gross_margin
        ]);
    }

    public function filter(Request $request)
    {
        $dateRange = $request->input('date_range'); // ex: "2025-08-01 to 2025-08-29"
        dd($dateRange);

        $sales = Sales::query();

        if ($dateRange) {
            $dates = explode(" to ", $dateRange);

            if (count($dates) === 2) {
                $from = Carbon::parse($dates[0])->startOfDay();
                $to   = Carbon::parse($dates[1])->endOfDay();

                $sales->whereBetween('created_at', [$from, $to]);
            } else {
                // kalau user cuma pilih 1 tanggal
                $sales->whereDate('created_at', Carbon::parse($dates[0]));
            }
        }

        $sales = $sales->get();

        return view('sales.index', compact('sales'));
    }


    public function print($id)
    {
        $sale = Sales::findOrFail($id);
        $saleItem = SalesItem::where('sale_id', $sale->id)->get();

        return view('print', [
            'sale' => $sale,
            'saleItem' => $saleItem
        ]);
    }
}

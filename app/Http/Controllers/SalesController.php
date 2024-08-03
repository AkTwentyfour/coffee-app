<?php

namespace App\Http\Controllers;

use App\Models\SalesItem;
use App\Models\Comodities;
use App\Models\Sales;
use Illuminate\Http\Request;

class SalesController extends Controller
{
    public function index()
    {
        $sales = Sales::all();

        $total_sales = [];
        foreach ($sales as $item) {
            $total_sales[] = $item->total_amount;
        }

        return view("admin.sales", [
            "sales" => $sales,
            'total'=> array_sum($total_sales)
        ]);
    }

    public function detail($id) {
        $salesItem = SalesItem::all()->where('sale_id', $id);
        $comodity = SalesItem::with('comodity')->get();

        $gross_profit = [];
        $save_profit = [];
        $net_profit = [];
        $dead_money = [];

        $index = 0;
        foreach( $salesItem as $item ) {
            // $capital = $item->comodity->capital * $item->quantity;
            $gross_profit[] = $item['subtotal'] - 5000;

            $save_profit[] = (5/100) * $gross_profit[$index];
            $net_profit[] = (85/100) * $gross_profit[$index];
            $dead_money[] = (10/100) * $gross_profit[$index];
            $index++;
        }

        return view('admin.salesDetail', [
            'sales_item'=> $salesItem,
            'comodities'=> $comodity,
            'gross_profit' => $gross_profit,
            'save_profit' => $save_profit,
            'net_profit' => $net_profit,
            'dead_money' => $dead_money,
        ]);
    }
}

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
            'total' => array_sum($total_sales), 
            // 'total_gross_margin' => $sales->gross_profit
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
        $sales->update([
            'gross_profit' => $subtotal_gross_margin
        ]);

        return view('admin.salesDetail', [
            'sales' => $sales['sale_date'],
            'sales_item' => $salesItem,
            'gross_margin' => $gross_margin,
            'subtotal_gross_margin' => $subtotal_gross_margin
        ]);

        // $gross_profit = [];
        // $save_profit = [];
        // $net_profit = [];
        // $dead_money = [];

        // $index = 0;
        // foreach ($salesItem as $item) {
        //     // $capital = $item->comodity->capital * $item->quantity;
        //     $gross_profit[] = $item['subtotal'] - 5000;

        //     $save_profit[] = (5 / 100) * $gross_profit[$index];
        //     $net_profit[] = (85 / 100) * $gross_profit[$index];
        //     $dead_money[] = (10 / 100) * $gross_profit[$index];
        //     $index++;
        // }

        // return view('admin.salesDetail', [
        //     'sales_item' => $salesItem,
        //     'comodities' => $comodity,
        //     'gross_profit' => $gross_profit,
        //     'save_profit' => $save_profit,
        //     'net_profit' => $net_profit,
        //     'dead_money' => $dead_money,
        // ]);
    }
    public function test()
    {
        $sales = Sales::all();


        return view('test', [
            'sales' => $sales
        ]);
    }

    public function testFeature(Request $request)
    {
        $sales = Sales::all();
        $shorted_date = Sales::whereDate('sale_date', $request['date'])->get();

        $total_sales = [];
        foreach ($sales as $item) {
            $total_sales[] = $item->total_amount;
        }

        return view("admin.sales", [
            "sales" => $sales,
            'total' => array_sum($total_sales),
            'shorted_date' => $shorted_date
        ]);
    }
}

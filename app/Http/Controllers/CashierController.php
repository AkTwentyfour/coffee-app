<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Models\Comodities;
use App\Models\ComodityCategory;
use App\Models\Sales;
use App\Models\SalesItem;
use Hamcrest\Arrays\IsArray;
use Illuminate\Support\Facades\DB;

class CashierController extends Controller
{
    public function index()
    {

        $comodities = Comodities::all();
        $comodityCategories = ComodityCategory::all();

        return view("cashier/index", [
            'comodities' => $comodities,
            'comodityCategories' => $comodityCategories
        ]);
    }

    public function store(Request $request)
    {
        // $stock = Comodities::find($request->id);
        $data = $request->except('_token');

        if (!$data) {
            return redirect()->back()->with('error', 'Belum ada menu yang dipilih, mohon ulangi transaksi');
        }

        $request->validate([
            'comodity_id' => 'required|array',
            'comodity_id.*' => 'exists:comodities,id',
            'quantity' => 'required|array',
            'quantity.*' => 'integer|min:1',
            'price' => 'required|array',
            'price.*' => 'numeric|min:0',
            'cash_paid' => 'required|numeric|min:0',
        ]);

        $count = count($data['comodity_id']);

        $total_amount = [];

        // count total_amount
        for ($i = 0; $i < $count; $i++) {
            $total_amount[] = $data['price'][$i] * $data['quantity'][$i];
        }

        // cash_paid < total validation
        $total = array_sum($total_amount);
        if ($request->cash_paid < $total) {
            return redirect()->back()->with('error', 'Uang yang dibayar kurang dari total belanja.');
        }


        DB::beginTransaction();
        try {
            // create Sales
            $storeSales = Sales::create([
                'sale_date' => date('Y-m-d H:i:s'),
                'total_amount' => $total,
                'cash_paid' => $data['cash_paid'],
                'change_amount' => $data['cash_paid'] - $total
            ]);

            // create SalesItem
            for ($i = 0; $i < $count; $i++) {
                $sale_item = SalesItem::create([
                    'sale_id' => $storeSales->id,
                    'comodity_id' => $data["comodity_id"][$i],
                    'quantity' => $data["quantity"][$i],
                    'price' => $data["price"][$i],
                    'subtotal' => $data["price"][$i] * $data["quantity"][$i],
                ]);
            }

            DB::commit();

            // update gross_profit column
            $salesItem = $storeSales->sales_item;
            $gross_margin = [];

            foreach ($salesItem as $item) {
                $margin = $item->comodity->price - $item->comodity->cogs;
                $gross_margin[] = $margin * $item['quantity'];
            }

            $subtotal_gross_margin = array_sum($gross_margin);
            $storeSales->update([
                'gross_profit' => $subtotal_gross_margin
            ]);

            return redirect()->route('sales.print', $storeSales->id);
            
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->with('error', 'terjadi kesalahan: ' . $e->getMessage());
        }
    }
}

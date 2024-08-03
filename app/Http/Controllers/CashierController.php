<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Models\Comodities;
use App\Models\Sales;
use App\Models\SalesItem;
use Hamcrest\Arrays\IsArray;

class CashierController extends Controller
{
    public function index()
    {

        $comodities = Comodities::all();

        return view("cashier/index", [
            'comodities' => $comodities
        ]);
    }

    public function store(Request $request)
    {
        // $stock = Comodities::find($request->id);
        $data = $request->except('_token');
        $count = count($data['comodity_id']);

        $total_amount = [];
        for ($i = 0; $i < $count; $i++) {
            $total_amount[] = $data['price'][$i] * $data['quantity'][$i];
        }

        $storeSales = Sales::create([
            'sale_date' => date('Y-m-d H:i:s'),
            'total_amount' => array_sum($total_amount)
        ]);

        for ($i = 0; $i < $count; $i++) {
            if ($data['quantity'][$i] !== "0") {
                $sale_item = SalesItem::create([
                    'sale_id' => $storeSales->id,
                    'comodity_id' => $data["comodity_id"][$i],
                    'quantity' => $data["quantity"][$i],
                    'price' => $data["price"][$i],
                    'subtotal' => $data["price"][$i] * $data["quantity"][$i],
                ]);
            }
        }

        return redirect(route('cashier'));
    }
}

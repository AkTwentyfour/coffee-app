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

        $data = $request->except('_token');

        $storeSales = Sales::create([
            'sale_date' => date('Y-m-d H:i:s'),
            'total_amount' => 10000
        ]);

        $count = count($data['comodity_id']);

        for ($i = 0; $i < $count; $i++) {
            if ($data['quantity'][$i] !== "0") {
                var_dump($data['quantity'][$i]);
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

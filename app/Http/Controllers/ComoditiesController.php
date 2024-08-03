<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comodities;

class ComoditiesController extends Controller
{
    function index()
    {

        $comodities = Comodities::all();
        $food = $comodities->where('category', 'food');
        $beverage = $comodities->where('category', 'beverage');

        // var_dump($test);

        return view("admin.comodity", [
            "comodities" => $comodities,
            'food' => $food,
            'beverage'=> $beverage
        ]);
    }

    function add(Request $request)
    {
        $images = $request->file('images');
        $imagesName = $images->getClientOriginalName();
        $images->move(public_path('comodity_images'), $imagesName);

        Comodities::create([
            'name' => $request['name'],
            'price' => $request['price'],
            'stock' => $request['stock'],
            'category' => $request['category'],
            'images' => $imagesName,
        ]);

        return redirect('comodity');
    }

    function edit(Request $request, Comodities $comodities)
    {
        $id = $request['id'];
        $item = Comodities::find($id);
        $image = $item['images'];

        if ($request->hasFile('images')) {
            $images = $request->file('images');
            $imagesName = time() . '.' . $images->getClientOriginalExtension();
            $images->move(public_path('comodity_images'), $imagesName);
            $image = $imagesName;
        }

        $item->update([
            'name' => $request['name'],
            'price' => $request['price'],
            'stock' => $request['stock'],
            'category' => $request['category'],
            'images' => $image,
        ]);

        return redirect('comodity');
    }

    function delete(Request $request)
    {
        $id = $request['id'];
        $item = Comodities::find($id);

        $item->delete();

        return redirect('comodity');
    }
}

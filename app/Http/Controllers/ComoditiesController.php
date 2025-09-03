<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comodities;
use App\Models\ComodityCategory;

class ComoditiesController extends Controller
{
    public function index()
    {

        $comodities = Comodities::all();
        $comodityCategories = ComodityCategory::all();
        $food = $comodities->where('category', 'food');
        $beverage = $comodities->where('category', 'beverage');

        // var_dump($test);

        return view("admin.comodity", [
            "comodities" => $comodities,
            "comodityCategories" => $comodityCategories,
            'food' => $food,
            'beverage' => $beverage
        ]);
    }

    public function add(Request $request)
    {
        // Validasi input
        $validated = $request->validate([
            'name'     => 'required|string|max:255',
            'price'    => 'required|numeric|min:0',
            'stock'    => 'required|integer|min:0',
            'comodity_category_id' => 'required|string|max:255',
            'images'   => 'image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $imagesName = 'placeholder-red.png';
        
        // Simpan gambar
        if ($request->hasFile('images')) {
            $images = $request->file('images');
            $imagesName = time() . '_' . uniqid() . '.' . $images->getClientOriginalExtension();
            $images->move(public_path('comodity_images'), $imagesName);
        } 

        // Simpan data
        Comodities::create([
            'name'     => $validated['name'],
            'price'    => $validated['price'],
            'stock'    => $validated['stock'],
            'comodity_category_id' => $validated['comodity_category_id'],
            'images'   => $imagesName,
        ]);

        return redirect('comodity')->with('success', 'Commodity added successfully!');
    }

    public function edit(Request $request)
    {
        // dd($request->all());
        $comodity = Comodities::findOrFail($request->id);
        // validasi input
        $validated = $request->validate([
            'name'     => 'required|string|max:255',
            'price'    => 'required|numeric|min:0',
            'stock'    => 'required|integer|min:0',
            'comodity_category_id' => 'required|string|max:255',
            'images'   => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        // simpan nama gambar lama
        $imageName = $comodity->images;

        // jika ada upload gambar baru
        if ($request->hasFile('images')) {
            // // hapus gambar lama kalau ada (soon will be activated)
            // if ($imageName && file_exists(public_path('comodity_images/' . $imageName))) {
            //     unlink(public_path('comodity_images/' . $imageName));
            // }

            // simpan gambar baru
            $images = $request->file('images');
            $imageName = time() . '.' . $images->getClientOriginalExtension();
            $images->move(public_path('comodity_images'), $imageName);
        }

        // update data
        $comodity->update([
            'name'     => $validated['name'],
            'price'    => $validated['price'],
            'stock'    => $validated['stock'],
            'comodity_category_id' => $validated['comodity_category_id'],
            'images'   => $imageName,
        ]);

        return redirect('comodity')->with('success', 'Comodity updated successfully!');
    }

    public function delete(Request $request)
    {
        $comodity = Comodities::findOrFail($request->id);

        // Hapus file gambar dari folder (soon will be activated)
        // if ($comodity->images && file_exists(public_path('comodity_images/' . $comodity->images))) {
        //     unlink(public_path('comodity_images/' . $comodity->images));
        // }

        // Hapus data dari database
        $comodity->delete();

        return redirect('comodity')->with('success', 'Commodity deleted successfully!');
    }
}

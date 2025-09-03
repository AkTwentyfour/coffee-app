<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comodities;
use App\Models\ComodityCategory;

class ComodityCategoryController extends Controller
{
    public function index() {
        $comodityCategory = ComodityCategory::all();
        return view('admin.comodity-category', [
            'comodityCategory' => $comodityCategory
        ]);
    }

    public function add(Request $request)
    {
        // Validasi input
        $validated = $request->validate([
            'name'     => 'required|string|max:255',
        ]);

        // Simpan data
        ComodityCategory::create([
            'name'     => $validated['name']
        ]);

        return redirect('manage-category')->with('success', 'Category added successfully!');
    }


    public function edit(Request $request)
    {
        $comodityCategory = ComodityCategory::findOrFail($request->id);
        // validasi input
        $validated = $request->validate([
            'name'     => 'required|string|max:255'
        ]);

        // update data
        $comodityCategory->update([
            'name'     => $validated['name']
        ]);

        return redirect('manage-category')->with('success', 'Category updated successfully!');
    }


    public function delete(Request $request)
    {
        $comodityCategory = ComodityCategory::findOrFail($request->id);

        // Hapus data dari database
        $comodityCategory->delete();

        return redirect('manage-category')->with('success', 'Category deleted successfully!');
    }
}

<?php

namespace App\Http\Controllers;
use App\Brand;
use Illuminate\Http\Request;

class BrandController extends Controller
{
    public function index()
    {
        $brands = Brand::all();
        return view('brand.index', compact('brands'));
    }

    public function create()
    {
        return view('brand.create');
    }
    public function store(Request $request)
    {
        $validated = $request->validate([
            'brandName' => 'required|string|max:255'
        ]);
    
        Brand::create([
            'brandName' => $request->brandName // Correct access
        ]);
    
        return redirect()->route('brand.index');
    }


    public function edit($id)
    {
        $brand = Brand::find($id);
        return view('brand.edit', compact('brand'));

    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'brandName' => 'required|string|max:255'
        ]);
    
        $brand = Brand::findOrFail($id);
        $brand->update([
            'brandName' => $request->brandName // Correct property access
        ]);
    
        return redirect()->route('brand.index')->with('success', 'Brand updated successfully.');
    }


    public function destroy($id)
    {
        $brand = Brand::find($id);
        $brand->delete();

        return redirect()->route('brand.index')->with('success', 'Brand deleted.');
    }
}

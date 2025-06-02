<?php

namespace App\Http\Controllers;
use App\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $category = Category::all();
        return view('category.index', compact('category'));
    }

    public function create()
    {
        return view('category.create');
    }

    public function store(Request $request)
{
    $request->validate([
        'categoryName' => 'required|string|max:255'
    ]);

    $create = Category::create([
        'categoryName' => $request->categoryName
    ]);

    if(!$create) {
        return redirect()->route('category.index')->with('error', 'category gagal ditambahkan.');
    }
    return redirect()->route('category.index')->with('success', 'category berhasil ditambahkan.');
}


    public function edit($id)
    {
        $category = Category::find($id);
        return view('category.edit', compact('category'));

    }

    public function update(Request $request, $id)
{
    $request->validate([
        'categoryName' => 'required|string|max:255', // Ubah dari 'name' ke 'categoryName'
    ]);

    $category = Category::findOrFail($id);
    $update = $category->update([
        'categoryName' => $request->categoryName // Sesuaikan dengan nama field di database
    ]);

    if (!$update) {
        return redirect()->route('category.index')->with('error', 'Category update failed.');
    }
    return redirect()->route('category.index')->with('success', 'Category updated successfully.');
}

    public function destroy($id)
    {
        $category = Category::find($id);
        $delete = $category->delete();

        if (!$delete) {
            return redirect()->route('category.index')->with('error', 'category delete failed.');
        }
        return redirect()->route('category.index')->with('success', 'category deleted.');
    }
}


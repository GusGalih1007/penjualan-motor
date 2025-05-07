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

    Category::create([
        'categoryName' => $request->categoryName
    ]);

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
    $category->update([
        'categoryName' => $request->categoryName // Sesuaikan dengan nama field di database
    ]);

    return redirect()->route('category.index')->with('success', 'Category updated successfully.');
}

    public function destroy($id)
    {
        $category = Category::find($id);
        $category->delete();

        return redirect()->route('category.index')->with('success', 'category deleted.');
    }
}


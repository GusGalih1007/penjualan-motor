<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Engine;
class EngineController extends Controller
{
    public function index()
    {
        $engine = Engine::all();
        return view('engine.index', compact('engine'));
    }

    public function create()
    {
        return view('engine.create');
    }

    public function store(Request $request)
{
    $request->validate([
        'cc' => 'required|string|max:255' // Changed from engineName to cc
    ]);

    $create = Engine::create([
        'cc' => $request->cc // Changed from engineName to cc
    ]);

    if (!$create) {
        return redirect()->route('engine.index')->with('error', 'Engine gagal ditambahkan.');
    }
    return redirect()->route('engine.index')->with('success', 'Engine berhasil ditambahkan.');
}


    public function edit($id)
    {
        $engine = Engine::find($id);
        return view('engine.edit', compact('engine'));

    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'cc' => 'required|string|max:255'
        ]);

        $engine = Engine::findOrFail($id);
        $update = $engine->update($request->only('cc'));

        if (!$update) {
            return redirect()->route('engine.index')->with('error', 'Engine update failed.');
        }

        return redirect()->route('engine.index')->with('success', 'Engine updated successfully.');
    }

    public function destroy($id)
    {
        $engine = Engine::find($id);
        $delete = $engine->delete();

        if (!$delete) {
            return redirect()->route('engine.index')->with('error', 'Engine delete failed.');
        }
        return redirect()->route('engine.index')->with('success', 'Engine deleted.');
    }
}



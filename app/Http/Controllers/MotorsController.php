<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Motors;
use App\Category;
use App\Engine;
use App\Brand;

class MotorsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $dataMotors = Motors::all(); // or your query
        return view('motors.index', compact('dataMotors'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $dataCategory = Category::all();
        $dataEngine = Engine::all();
        $dataBrand = Brand::all();
        return view('motors.create', compact('dataCategory', 'dataEngine', 'dataBrand'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'motorName' => 'required',
            'color' => 'required',
            'categoryId' => 'required',
            'engineId' => 'required',
            'brandId' => 'required',
            'numberPlate' => 'required',
            'condition' => 'required',
            'price' => 'required',
            'stock' => 'required',
            'photo' => 'nullable|image|mimes:jpg,png,jpeg|max:2048', // Validasi foto
        ]);

        $photoPath = null; //motor-photo/penjualan-motor.png

        // Jika ada file yang diunggah
        if ($request->hasFile('photo')) {
            $photoPath = $request->file('photo')->
            store('motor-photos', 'public'); // Simpan ke folder public/storage
        }

        Motors::create([
            'motorName' => $request->motorName,
            'color' => $request->color,
            'categoryId' => $request->categoryId,
            'engineId' => $request->engineId,
            'brandId' => $request->brandId,
            'numberPlate' => $request->numberPlate,
            'condition' => $request->condition,
            'price' => $request->price,
            'stock' => $request->stock,
            'photo' => $photoPath,
        ]);

        return redirect(route('motor.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $dataEditmotors = Motors::find($id);
        $dataEditCategory = Category::all();
        $dataEditEngine = Engine::all();
        $dataEditBrand = Brand::all();
        return view('motors.edit', compact('dataEditmotors', 'dataEditCategory', 'dataEditEngine', 'dataEditBrand'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'motorName' => 'required',
            'color' => 'required',
            'categoryId' => 'required',
            'engineId' => 'required',
            'brandId' => 'required',
            'numberPlate' => 'required',
            'condition' => 'required',
            'price' => 'required',
            'stock' => 'required',
            'photo' => 'nullable|image|mimes:jpg,png,jpeg|max:2048', // Validasi foto
        ]);


        $dataUpdatemotors = Motors::find($id);
        $photoPath = $dataUpdatemotors->photo;

        // Jika ada file yang diunggah
        if ($request->hasFile('photo')) {
            // Hapus foto lama jika ada
            if ($dataUpdatemotors->photo) {
                Storage::disk('public')->delete($dataUpdatemotors->photo);
            }

            $photoPath = $request->file('photo')->
            store('motor-photos', 'public'); // Simpan foto baru
        }

        $dataUpdatemotors->update([
            'motorName' => $request->motorName,
            'color' => $request->color,
            'categoryId' => $request->categoryId,
            'engineId' => $request->engineId,
            'brandId' => $request->brandId,
            'numberPlate' => $request->numberPlate,
            'condition' => $request->condition,
            'price' => $request->price,
            'stock' => $request->stock,
            'photo' => $photoPath,
        ]);

        return redirect(route('motor.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Motors::where('motorId', $id)->delete();
        return redirect(route('motor.index'));
    }
}

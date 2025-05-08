<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Customers;

class CustomersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $dataCustomers = Customers::all();
        return view('customers.index', compact('dataCustomers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('customers.create');
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
            'customerName' => 'required',
            'email'         => 'required',
            'phone'         => 'required',
            'member_status' => 'required',
            'address'       => 'required'
        ]);

        Customers::create([
            'customerName' => $request->customerName,
            'email'         => $request->email,
            'phone'         => $request->phone,
            'member_status' => $request->member_status,
            'address'       => $request->address
        ]);

        return redirect(route('customer.index'));
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
        $dataEditcustomer = Customers::find($id);
        return view('customers.edit', compact('dataEditcustomer'));
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
            'customerName' => 'required',
            'email'         => 'required',
            'phone'         => 'required',
            'member_status' => 'required',
            'address'       => 'required'
        ]);

        $updateDatacustomer = Customers::findOrFail($id);
        $updateDatacustomer->update([
            'customerName' => $request->customerName,
            'email'         => $request->email,
            'phone'         => $request->phone,
            'member_status' => $request->member_status,
            'address'       => $request->address
        ]);

        return redirect(route('customer.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Customers::where('customerId', $id)->delete();
        return redirect(route('customer.index'));
    }
}

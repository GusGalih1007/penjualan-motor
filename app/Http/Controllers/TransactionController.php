<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\transaction;
use App\transactionDetail;
use App\payment;
use App\Motors;
use App\Customers;
use App\Users;
use Illuminate\Support\Facades\Auth;

class TransactionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Menampilkan daftar transaksi
        $transactions = transaction::with(
            'detail.motor',
            'customer',
            'payment',
            'users')->orderBy('transactionId', 'desc')->get();

        return view('transactions.index', compact('transactions'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $customers = Customers::all(); // Ambil daftar pelanggan
        $motors = Motors::where('stock','>',0)->get(); // Ambil daftar barang

        return view('transactions.create', compact('customers', 'motors'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //dd($request);
        $request->validate([
            'customerId' => 'nullable|exists:tbl_customers,customerId',
            'payment_method' => 'required|string',
            'motors' => 'required|array',
            'motors.*.motorId' => 'required|exists:tbl_motors,motorId',
            'motors.*.qty' => 'required|integer|min:1',
            'payment' => 'required|numeric|min:0',
        ]);

        // Ambil data customer
        $customer = Customers::find($request->customerId);

        // Inisialisasi variabel untuk total harga
        $totalAmount = 0;

        // Loop melalui produk yang dipilih dan hitung total harga
        $motors = [];
        foreach ($request->motors as $motorData) {
            $motor = Motors::find($motorData['motorId']);
            $totalAmount += $motor->price * $motorData['qty'];

            // Simpan produk beserta kuantitas untuk TransactionDetails
            $motors[] = [
                'motorId' => $motor->motorId,
                'quantity' => $motorData['qty'],
                'price' => $motor->price,
                'total' => $motor->price * $motorData['qty'],
            ];
        }

        // Hitung total setelah diskon
        $totalAfterDiscount = $totalAmount - $request->discount;

        // Simpan data transaksi ke tabel 'transactions'
        $transaction = transaction::create([
            'customerId'       => $request->customerId,
            'userId'           => Auth::id(),  // ID user yang melakukan transaksi
            'totalAmount'      => $totalAfterDiscount,
            'discount'          => $request->discount,
            'payment_method'    => $request->payment_method,
            'payment'           => $request->payment,
            'change'            => $request->change,
            'status'            => "completed"
        ]);

        dd(Auth::id());

        // Simpan detail transaksi ke tabel 'transaction_details'
        foreach ($motors as $motor) {
            transactionDetail::create([
                'transactionId' => $transaction->transactionId,
                'motorId' => $motor['motorId'],
                'quantity' => $motor['quantity'],
                'price' => $motor['price'],
                'total' => $motor['total'],
            ]);

            // Update stok produk (kurangi stok berdasarkan jumlah yang dibeli)
            $motorModel = Motors::find($motor['motorId']);
            $motorModel->stock -= $motor['quantity'];
            $motorModel->save();
        }

        // Simpan data pembayaran ke tabel 'payments'
        payment::create([
            'transactionId' => $transaction->transactionId,
            'payment_method' => $request->payment_method,
            'amount'         => $request->payment,
            'change'         => $request->change,
            'payment_date'   => today(),
            'user_id'       => Auth::id(),  // ID user yang menerima pembayaran
        ]);

        // Redirect atau kirim respons sukses
        return redirect()->route('transaction.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $transaction = transaction::with('detail.motor', 'customer', 'payment', 'users')->findOrFail($id);

        return view('transactions.show', compact('transaction'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        transaction::where('transactionId', $id)->delete();
        return redirect()->route('transaction.index');
    }
}

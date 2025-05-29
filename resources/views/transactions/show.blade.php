@extends('template.admin')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <!-- Card Container -->
            <div class="card">
                <div class="card-body">
                    <h3 class="card-title">Transaksi #{{ $transaction->transactionId }}</h3>

                    <div class="card mb-3">
                        <div class="card-body">
                            <h5 class="card-title">Status Transaksi</h5>
                            <p class="card-text">{{ $transaction->status }}</p>

                            <h5 class="card-title">Tanggal Pembayaran</h5>
                            <p class="card-text">{{ $transaction->payment->payment_date }}</p>
                        </div>
                    </div>

                    <!-- Informasi Customer -->
                    <div class="row">
                        <div class="col-6">
                            <div class="card mb-3">
                                <div class="card-body">
                                    <h5 class="card-title">Customer</h5>
                                    <p class="card-text">{{ $transaction->customer->customerName ?? 'Guest' }}</p>
                                </div>
                            </div>
                        </div>
                        <!-- Metode Pembayaran -->
                        <div class="col-6">
                            <div class="card mb-3">
                                <div class="card-body">
                                    <h5 class="card-title">Metode Pembayaran</h5>
                                    <p class="card-text">{{ $transaction->payment->payment_method }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Diskon -->
                    <div class="card mb-3">
                        <div class="card-body">
                            <h5 class="card-title">Diskon</h5>
                            <p class="card-text">Rp. {{ number_format($transaction->discount, 2) }}</p>
                        </div>
                    </div>

                    <!-- Total Amount -->
                    <div class="card mb-3">
                        <div class="card-body">
                            <h5 class="card-title">Total Harga</h5>
                            <p class="card-text">Rp. {{ number_format($transaction->totalAmount, 2) }}</p>
                        </div>
                    </div>

                    <!-- Daftar Produk -->
                    <div class="card mb-3">
                        <div class="card-body">
                            <h5 class="list-group">Produk yang Dibeli</h5>

                            @foreach ($transaction->details as $detail)
                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                    <div>
                                        <strong>{{ $detail->motor->motorName }}</strong><br>
                                        Harga Satuan: Rp. {{ number_format($detail->motor->price, 2) }}<br>
                                        Jumlah: {{ $detail->quantity }}
                                    </div>
                                    <div class="motor-img">
                                        @if ($detail->motor->photo)
                                            <img src="{{ asset('storage/' . $detail->motor->photo) }}"
                                                alt="{{ $detail->motor->motorName }}" class="card-img-top"
                                                style="width: 100px;">
                                        @else
                                            <img src="https://via.placeholder.com/100" alt="No Image" width="100">
                                        @endif


                                    </div>
                                </li>
                            @endforeach

                        </div>
                    </div>

                    <!-- Pembayaran -->
                    <div class="card mb-3">
                        <div class="card-body">
                            <h5 class="card-title">Pembayaran</h5>
                            <p class="card-text">Rp. {{ number_format($transaction->payment->amount, 2) }}</p>
                        </div>
                    </div>

                    <!-- Kembalian -->
                    <div class="card mb-3">
                        <div class="card-body">
                            <h5 class="card-title">Kembalian</h5>
                            <p class="card-text">Rp. {{ number_format($transaction->payment->change, 2) }}</p>
                        </div>
                    </div>
                    <div class="card-footer">
                        <a href="{{ route('transaction.index') }}" class="btn btn-secondary">Kembali</a>
                    </div>
                </div>
                <!-- Back Button -->
            </div>
        </div>
    </div>
@endsection

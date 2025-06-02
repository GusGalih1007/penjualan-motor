@extends('template.admin')

@section('content')
<div class="row">
    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
            @if (session('success'))
            <span class="alert alert-success">{{ session('success') }}</span>
            @elseif (session('error'))
            <span class="alert alert-danger">{{ session('error') }}</span>
            @endif
            <div class="card-body">
                <h4 class="card-title">Data Transactions</h4>
                <div class="table-responsive pt-3">
                    <table class="table table-bordered table-hover text-wrap" id="example1">
                        <thead class="bg-info text-white">
                            <th>No</th>
                                <th>Transaction Id</th>
                                <th>Customer</th>
                                <th>Total Belanja</th>
                                <th>Total Pembayaran</th>
                                <th>Kasir</th>
                                <th>Status Transaction</th>
                                <th>Tanggal Transaction</th>
                                <th><a href="{{ route('transaction.create') }}" class="btn btn-primary btn-sm">Create Transactions</a></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($transactions as $transaction)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $transaction->transactionId }}</td>
                                <td>{{ $transaction->customer->customerName ?? 'Guest' }}</td>
                                <td>Rp. {{ number_format($transaction->totalAmount, 2) }}</td>
                                <td>Rp. {{ number_format($transaction->payment->amount ?? 0, 2) }}</td>
                                <td>{{ $transaction->users->userName }}</td>
                                <td>{{ ucfirst($transaction->status) }}</td>
                                <td>{{ $transaction->created_at->format('d-m-Y') }}</td>
                                <td>

                                    <form action="{{ route('transaction.destroy', $transaction->transactionId) }}" method="POST"
                                        style="display:inline;">
                                        @csrf
                                        @method('DELETE')
                                        <a href="{{ route('report.generateId', $transaction->transactionId) }}" class="btn btn-warning btn-sm" target="_blank">Print</a>
                                        <a href="{{ route('transaction.show', $transaction->transactionId) }}"
                                            class="btn btn-success btn-sm">Detail</a>
                                        <button type="submit"  class="btn btn-danger btn-sm"
                                            onclick="return confirm('Apakah Anda yakin ingin menghapus transaksi ini?')">Delete</button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

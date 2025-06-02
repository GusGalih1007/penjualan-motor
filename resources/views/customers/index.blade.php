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
                    <h4 class="card-title">Category</h4>
                    <div class="table-responsive pt-3">
                        <table class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Customer Name</th>
                                    <th>Email</th>
                                    <th>Phone</th>
                                    <th>Address</th>
                                    <th>Member Status</th>
                                    <th>Action | <a href="{{ route('customer.create') }}"
                                            class="btn btn-success btn-sm">Add</a></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($dataCustomers as $customer)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $customer->customerName }}</td>
                                        <td>{{ $customer->email }}</td>
                                        <td>{{ $customer->phone }}</td>
                                        <td>{{ $customer->address }}</td>
                                        <td>{{ $customer->member_status ? 'Yes' : 'No' }}</td>
                                        <td>
                                            <form action="{{ route('customer.destroy', $customer->customerId) }}"
                                                method="POST" style="display:inline-block;">
                                                @csrf
                                                @method('DELETE')
                                                <a href="{{ route('customer.edit', $customer->customerId) }}"
                                                    class="btn btn-warning btn-sm">Edit</a>
                                                <button type="submit" onclick="return confirm('Yakin hapus?')"
                                                    class="btn btn-danger btn-sm">Delete</button>
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

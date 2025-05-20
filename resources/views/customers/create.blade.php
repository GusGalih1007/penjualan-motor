@extends('template.admin')

@section('content')
<div class="row">
    <div class="col-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Create Customers</h4>
                <form action="{{ route('customer.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                <div class="form-group">
                    <label for="customerName">Customer Name</label>
                    <input type="text" name="customerName" class="form-control" id="customerName" placeholder="Customer Name"
                        value="{{ old('customerName') }}" required>
                    @error('customerName')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" name="email" class="form-control" id="email" placeholder="Email"
                        value="{{ old('email') }}" required>
                    @error('email')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="phone">Phone</label>
                    <input type="number" name="phone" class="form-control" id="phone" placeholder="Phone"
                        value="{{ old('phone') }}" required>
                    @error('phone')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="address">Address</label>
                    <textarea type="text" name="address" class="form-control" id="address" placeholder="address"
                        value="{{ old('address') }}" required></textarea>
                    @error('address')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label class="col-sm-3 col-form-label">Member Status</label>
                    <div class="col-sm-4">
                        <div class="form-check">
                            <label class="form-check-label">
                                <input type="radio" class="form-check-input" name="member_status" id="member_status1" value="1">
                                True
                            </label>
                        <div class="form-check">
                            <label class="form-check-label">
                                <input type="radio" class="form-check-input" name="member_status" id="member_status2" value="0" checked>
                                False
                            </label>
                        </div>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary me-2">Simpan</button>
                <a href="{{ route('category.index') }}" class="btn btn-light">Back</a>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

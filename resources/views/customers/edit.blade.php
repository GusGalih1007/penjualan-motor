@extends('template.admin')
@section('content')
<div class="row">
    <div class="col-12grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Edit Customer</h4>
                <form action="{{ route('customer.update', $dataEditcustomer->customerId) }}" method="POST">
                    @csrf
                    @method('PUT')

                <div class="form-group">
                    <label for="customerName">Customer Name</label>
                    <input type="text" name="customerName" class="form-control" id="customerName" placeholder="Customer Name"
                    value="{{ old('customerName', $dataEditcustomer->customerName) }}" required>
                    @error('customerName')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" name="email" class="form-control" id="email" placeholder="Email"
                        value="{{ old('email', $dataEditcustomer->email) }}" required>
                    @error('email')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="phone">Phone</label>
                    <input type="number" name="phone" class="form-control" id="phone" placeholder="phone"
                        value="{{ old('phone', $dataEditcustomer->phone) }}" required>
                    @error('phone')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="address">Address</label>
                    <textarea name="address" id="address" class="form-control"
                        required>{{ old('address', $dataEditcustomer->address) }}</textarea>
                    @error('address')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label class="col-sm-3 col-form-label">Member Status</label>
                    <div class="col-sm-4">
                        <div class="form-check">
                            <label class="form-check-label">
                                <input type="radio" class="form-check-input" name="member_status" id="member_status1" value="1"{{ ($dataEditcustomer->member_status == 1) ? 'checked' : '' }}>
                                True
                            </label>
                        <div class="form-check">
                            <label class="form-check-label">
                                <input type="radio" class="form-check-input" name="member_status" id="member_status2" value="0" {{ ($dataEditcustomer->member_status == 0) ? 'checked' : '' }}>
                                False
                            </label>
                        </div>
                        @error('member_status')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <button type="submit" class="btn btn-primary">Update</button>
                <a href="{{ route('customer.index') }}" class="btn btn-secondary">Back</a>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

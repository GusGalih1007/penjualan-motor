<h2>Edit Customers</h2>
<form action="{{ route('customer.update', $dataEditcustomer->customerId) }}" method="POST">
    @csrf
    @method('PUT')
    <div class="form-group">
        <label for="customerName">Customer Name</label>
        <input type="text" name="customerName" id="customerName" class="form-control"
               value="{{ old('customerName', $dataEditcustomer->customerName) }}" required>
        @error('customerName')
            <div class="text-danger">{{ $message }}</div>
        @enderror
    </div>

    <div class="form-group">
        <label for="email">Email</label>
        <input type="email" name="email" id="email" class="form-control"
               value="{{ old('email', $dataEditcustomer->email) }}" required>
        @error('email')
            <div class="text-danger">{{ $message }}</div>
        @enderror
    </div>

    <div class="form-group">
        <label for="phone">Phone</label>
        <input type="number" name="phone" id="phone" class="form-control"
               value="{{ old('phone', $dataEditcustomer->phone) }}" required>
        @error('phone')
            <div class="text-danger">{{ $message }}</div>
        @enderror
    </div>

    <div class="form-group">
        <label for="address">Address</label>
        <textarea name="address" id="address" class="form-control" required>{{ old('address', $dataEditcustomer->address) }}</textarea>
        @error('address')
            <div class="text-danger">{{ $message }}</div>
        @enderror
    </div>

    <div class="form-group">
        <label for="member_status">Member Status</label>
        <input type="radio" name="member_status" value=1 {{ ($dataEditcustomer->member_status == 1) ? 'checked' : '' }}>
        <label class="form-check-label" for="member_status">True</label>

        <input type="radio" name="member_status" value=0 {{ ($dataEditcustomer->member_status == 0) ? 'checked' : '' }}>
        <label class="form-check-label" for="member_status">False</label>
        @error('member_status')
            <div class="text-danger">{{ $message }}</div>
        @enderror
    </div>

    <button type="submit" class="btn btn-primary">Update</button>
    <a href="{{ route('customer.index') }}" class="btn btn-secondary">Back</a>
</form>

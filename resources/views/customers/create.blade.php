<form action="{{ route('customer.store') }}" method="POST">
    @csrf
    <label>Customer Name:</label>
    <input type="text" name="customerName">

    <label>Email:</label>
    <input type="email" name="email">

    <label>Phone:</label>
    <input type="number" name="phone">

    <label>Address:</label>
    <textarea name="address"></textarea>

    <label>Member Status:</label>
    <input class="form-check-input" type="radio" name="member_status" value=1>
    <label class="form-check-label" for="member_status">True</label>

    <input class="form-check-input" type="radio" name="member_status" value=0 checked>
    <label class="form-check-label" for="member_status">False</label>

    <button type="submit">Simpan</button>
    <a href="{{ route('customer.index') }}" class="btn btn-secondary">Back</a>
</form>

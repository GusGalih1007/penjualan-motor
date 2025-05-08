<form action="{{ route('brand.store') }}" method="POST">
    @csrf
    <label>Brand Name:</label>
    <input type="text" name="brandName">
    <button type="submit">Simpan</button>
    <a href="{{ route('brand.index') }}" class="btn btn-secondary">Back</a>
</form>

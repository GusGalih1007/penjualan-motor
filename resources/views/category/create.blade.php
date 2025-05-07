<form action="{{ route('category.store') }}" method="POST">
    @csrf
    <label>Category Name:</label>
    <input type="text" name="categoryName">
    <button type="submit">Simpan</button>
</form>

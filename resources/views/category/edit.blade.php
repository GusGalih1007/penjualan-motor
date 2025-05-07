<h2>Edit Category</h2>
<form action="{{ route('category.update', $category->categoryId) }}" method="POST">
    @csrf
    @method('PUT')
    <div class="form-group">
        <label for="categoryName">Category Name</label>
        <input type="text" name="categoryName" id="categoryName" class="form-control" 
               value="{{ old('categoryName', $category->categoryName) }}" required>
        @error('categoryName')
            <div class="text-danger">{{ $message }}</div>
        @enderror
    </div>
    <button type="submit" class="btn btn-primary">Update</button>
    <a href="{{ route('category.index') }}" class="btn btn-secondary">Back</a>
</form>
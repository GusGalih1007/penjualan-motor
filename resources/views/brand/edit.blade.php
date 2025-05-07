<h2>Edit Brand</h2>
<form action="{{ route('brand.update', $brand->brandId) }}" method="POST">
    @csrf
    @method('PUT')
    <div class="form-group">
        <label for="brandName">Brand Name</label>
        <input type="text" name="brandName" id="brandName" class="form-control" 
               value="{{ old('brandName', $brand->brandName) }}" required>
        @error('brandName')
            <div class="text-danger">{{ $message }}</div>
        @enderror
    </div>
    <button type="submit" class="btn btn-primary">Update</button>
    <a href="{{ route('brand.index') }}" class="btn btn-secondary">Back</a>
</form>


<div class="container mt-4">
    <h2>Add New Motorcycle</h2>
    <form action="{{ route('motor.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="row">
            <div class="col-md-6">
                <div class="form-group mb-3">
                    <label for="motorName" class="form-label">Motor Name:</label>
                    <input type="text" name="motorName" id="motorName" class="form-control"
                           value="{{ old('motorName') }}" required>
                    @error('motorName')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group mb-3">
                    <label for="color" class="form-label">Color:</label>
                    <input type="text" name="color" id="color" class="form-control"
                           value="{{ old('color') }}" required>
                    @error('color')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label class="form-label">Category:</label>
                    <select name="categoryId">
                    <option value="">Select Category</option>

                    @foreach ($dataCategory as $category)
                    <option value="{{ $category->categoryId }}" @if (old('categoryId')==$category->categoryId) selected @endif>{{ $category->categoryName }}</option>
                    @endforeach
                    </select></br>
                    @if ($errors->has('categoryId'))
                    <span class="label label-danger">{{ $errors->first('categoryId') }}</span>
                    @endif
                </div>

                <div class="form-group mb-3">
                    <label class="form-label">Engine:</label>
                    <select name="engineId">
                    <option value="">Select Engine</option>

                    @foreach ($dataEngine as $engine)
                    <option value="{{ $engine->engineId }}" @if (old('engineId')==$engine->engineId) selected @endif>{{ $engine->cc }}</option>
                    @endforeach
                    </select></br>
                    @if ($errors->has('engineId'))
                    <span class="label label-danger">{{ $errors->first('engineId') }}</span>
                    @endif
                </div>
            </div>

            <div class="col-md-6">
                <div class="form-group mb-3">
                    <label class="form-label">Brand:</label>
                    <select name="brandId">
                    <option value="">Select Brand</option>

                    @foreach ($dataBrand as $brand)
                    <option value="{{ $brand->brandId }}" @if (old('brandId')==$brand->brandId) selected @endif>{{ $brand->brandName }}</option>
                    @endforeach
                    </select></br>
                    @if ($errors->has('brandId'))
                    <span class="label label-danger">{{ $errors->first('brandId') }}</span>
                    @endif
                </div>

                <div class="form-group mb-3">
                    <label for="numberPlate" class="form-label">Number Plate:</label>
                    <input type="text" name="numberPlate" id="numberPlate" class="form-control"
                           value="{{ old('numberPlate') }}" required>
                    @error('numberPlate')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group mb-3">
                    <label for="price" class="form-label">Price:</label>
                    <input type="number" name="price" id="price" class="form-control"
                           value="{{ old('price') }}" required min="0">
                    @error('price')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group mb-3">
                    <label for="stock" class="form-label">Stock:</label>
                    <input type="number" name="stock" id="stock" class="form-control"
                           value="{{ old('stock') }}" required min="0">
                    @error('stock')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group mb-3">
                    <label for="photo" class="form-label">Photo:</label>
                    <input type="file" name="photo" id="photo" class="form-control">
                    @error('photo')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
            </div>
        </div>

        <div class="form-group mt-4">
            <button type="submit" class="btn btn-primary">Save</button>
            <a href="{{ route('motor.index') }}" class="btn btn-secondary">Back</a>
        </div>
    </form>
</div>

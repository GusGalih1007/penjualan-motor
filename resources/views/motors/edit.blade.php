<div class="container mt-4">
    <h2>Edit Motorcycle</h2>
    <form action="{{ route('motor.update', $dataEditmotors->motorId) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="row">
            <div class="col-md-6">
                <div class="form-group mb-3">
                    <label for="motorName" class="form-label">Motor Name:</label>
                    <input type="text" name="motorName" id="motorName" class="form-control"
                           value="{{ old('motorName', $dataEditmotors->motorName) }}" required>
                    @error('motorName')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group mb-3">
                    <label for="color" class="form-label">Color:</label>
                    <input type="text" name="color" id="color" class="form-control"
                           value="{{ old('color', $dataEditmotors->color) }}" required>
                    @error('color')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group mb-3">
                    <label class="form-label">Category:</label>
                    <select name="categoryId" class="form-control">
                        <option value="">Select Category</option>
                        @foreach ($dataCategory as $category)
                            <option value="{{ $category->categoryId }}"
                                @if(old('categoryId', $dataEditmotors->categoryId) == $category->categoryId) selected @endif>
                                {{ $category->categoryName }}
                            </option>
                        @endforeach
                    </select>
                    @error('categoryId')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group mb-3">
                    <label class="form-label">Engine:</label>
                    <select name="engineId" class="form-control">
                        <option value="">Select Engine</option>
                        @foreach ($dataEngine as $engine)
                            <option value="{{ $engine->engineId }}"
                                @if(old('engineId', $dataEditmotors->engineId) == $engine->engineId) selected @endif>
                                {{ $engine->cc }}
                            </option>
                        @endforeach
                    </select>
                    @error('engineId')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <div class="col-md-6">
                <div class="form-group mb-3">
                    <label class="form-label">Brand:</label>
                    <select name="brandId" class="form-control">
                        <option value="">Select Brand</option>
                        @foreach ($dataBrand as $brand)
                            <option value="{{ $brand->brandId }}"
                                @if(old('brandId', $dataEditmotors->brandId) == $brand->brandId) selected @endif>
                                {{ $brand->brandName }}
                            </option>
                        @endforeach
                    </select>
                    @error('brandId')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group mb-3">
                    <label for="numberPlate" class="form-label">Number Plate:</label>
                    <input type="text" name="numberPlate" id="numberPlate" class="form-control"
                           value="{{ old('numberPlate', $dataEditmotors->numberPlate) }}" required>
                    @error('numberPlate')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group mb-3">
                    <label for="price" class="form-label">Price:</label>
                    <input type="number" name="price" id="price" class="form-control"
                           value="{{ old('price', $dataEditmotors->price) }}" required min="0">
                    @error('price')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group mb-3">
                    <label for="stock" class="form-label">Stock:</label>
                    <input type="number" name="stock" id="stock" class="form-control"
                           value="{{ old('stock', $dataEditmotors->stock) }}" required min="0">
                    @error('stock')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group mb-3">
                    <label for="photo" class="form-label">Photo:</label>
                    <input type="file" name="photo" id="photo" class="form-control">
                    @if($dataEditmotors->photo)
                        <div class="mt-2">
                            <img src="{{ asset('storage/'.$dataEditmotors->photo) }}" width="100" class="img-thumbnail">
                            <a href="#" class="text-danger" onclick="event.preventDefault(); document.getElementById('remove-photo').value = '1'">Remove photo</a>
                            <input type="hidden" name="remove_photo" id="remove-photo" value="0">
                        </div>
                    @endif
                    @error('photo')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
            </div>
        </div>

        <div class="form-group mt-4">
            <button type="submit" class="btn btn-primary">Update</button>
            <a href="{{ route('motor.index') }}" class="btn btn-secondary">Back</a>
        </div>
    </form>
</div>
